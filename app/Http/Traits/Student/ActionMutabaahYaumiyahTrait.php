<?php

namespace Traits\Student;

/* Models */

use App\Models\Student;
use App\Models\Mutabaah;
use App\Models\MutabaahAchievement;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

trait ActionMutabaahYaumiyahTrait
{

    protected $student;

    protected $studentHasFilledToday = "Hari ini udah ngisi MY sob! 🤩";

    /**
     * initAction
     * 
     * Run the main function on this trait
     */
    public function initAction($request)
    {
        // Get student data
        $this->getStudent();

        // Get standard value
        $this->standardValue();

        // Student has filled today
        //$this->studentHasFilledToday($this->student->id);

        try {

            // Run process cinta ibadah
            $this->processCintaIbadah($request);
            
            // Insert to mutabaah history
            $this->insertToMutabaahHistory($this);

            // Insert to mutabaah achievement
            $this->insertToMutabaahAchievement($this);

            

            return redirect()->back()->with('message', [
                'message' => 'Yeay Mutabaah kamu sudah di isi hari ini 😎',
                'type' => 'success',
            ]);

        } catch (QueryException $th) {
            return back()->withErrors(['error' => 'Kesalahan internal hubungi bantuan (404) [' . $th->getMessage() . ']']);
        }

    }

    /**
     * getStudent
     * 
     * @param string
     * @return object
     */
    protected function getStudent()
    {
        $this->student = Student::with(["MutabaahAchievements" => function ($q) {
            return $q->where('expired_at', '>', today());
        }])->where('user_id', auth()->user()->id)->first();

        return $this->student;
    }

    /**
     * studentHasFilledToday
     */
    protected function studentHasFilledToday($studentID)
    {
        $isFilled =  Mutabaah::where('student_id', $studentID)
            ->whereDate('created_at', today())
            ->first();

        if (!is_null($isFilled)) {
            return back()->withErrors(['error' => $this->studentHasFilledToday]);
        }
    }

    /**
     * standardValue
     * 
     * @return array
     */
    protected function standardValue()
    {
        // Max days this month
        $maxDay = date('t'); // 31


        $this->standardValue = (object) [
            'shalat' =>
            [
                'fardhu' => 5*$maxDay,
                'rawatib'   => 8*$maxDay,
                'tahajjud'  => $maxDay,
                'dhuha'     => $maxDay,
                'total'     => ((8+5)*$maxDay) + ($maxDay*2) //5*31 + 8*31 + 31*2 //((5*31)*8) + (31*2), ($maxDay())
            ],
            'odoj'  =>
            [
                'juz'       => 21,
                'lembar'    => 105,
                'total'     => 126,
            ],
            'shaum' =>
            [
                'monday'    => 3,
                'thursday'  => 3,
                'total'     => 6,
            ],
            'dzikir' =>
            [
                'morning'   => 21,
                'afternoon' => 21,
                'total'     => 42,
            ],
            'shodaqoh'  => 21,
        ];

        return $this;
    }

    /**
     * insertToMutabaahHistory
     * 
     * @param object
     */
    protected function insertToMutabaahHistory($data)
    {
        Mutabaah::create([
            'student_id'        => $data->student->id,
            'shalat_fardhu'     => $data->ShalatFardhuToCommaText,
            'shalat_rawatib'    => $data->isShalatRawatib,
            'shalat_tahajjud'   => $data->isShalatTahajjud,
            'shalat_dhuha'      => $data->isShalatDhuha,
        ]);
    }

    /**
     * insertToMutabaahAchievement
     */
    protected function insertToMutabaahAchievement($data)
    {
        $mutabaahAchievement = MutabaahAchievement::where('student_id', $data->student->id)
        ->whereMonth('created_at', today()->format('m'))
        ->first();

        if (!is_null($mutabaahAchievement)) {

            $mutabaahAchievement->cinta_shalat += $data->FinalCintaShalat;
            $mutabaahAchievement->save();
        } else {

            MutabaahAchievement::create([
                'student_id'   => $data->student->id,
                'cinta_shalat' => $data->FinalCintaShalat,
            ]);
        }
    }



    /**
     * processCintaIbadah
     * 
     * @param object|request
     * @return object|this
     */
    protected function processCintaIbadah($request)
    {
        // Shalat fardhu
        $this->processShalatFardhu($request->shalat_fardhu);

        // Shalat rawatib
        $this->processShalatRawatib($request->shalat_rawatib);

        // Shalat Tahajjud
        $this->processShalatTahajjud($request->shalat_tahajjud);

        // Shalat Dhuha
        $this->processShalatDhuha($request->shalat_dhuha);

        /**
         * "calculateEndCintaShalat" starts from "0", 
         * then added to each mandatory prayer, 
         * after the addition is complete it will enter the "FinalCintaShalat" 
         * process where "calculateEndCintaShalat" 
         * is divided by the standard of each prayer then multiplied by "100" 
         * (100 because the final value is desired)
         */

        // Algorithm
        $this->calculateEndCintaShalat = 0;
        $this->calculateEndCintaShalat += $this->countShalatFardhu;
        $this->calculateEndCintaShalat += $this->isShalatRawatib;
        $this->calculateEndCintaShalat += $this->isShalatTahajjud;
        $this->calculateEndCintaShalat += $this->isShalatDhuha;
        
        // Final Cinta Shalat
        $this->FinalCintaShalat = $this->calculateEndCintaShalat/$this->standardValue->shalat['total']*100;

        return $this;
    }

    /**
     * processShalatFardhu
     * 
     * @param object|$shalat_fardhu
     * @return object|$this
     */
    protected function processShalatFardhu($shalat_fardhu = NULL)
    {
        // Set default countShalatFardhu
        $countShalatFardhu = 0;

        // Convert shalat fardhu from array to comma separated list
        $this->ShalatFardhuToCommaText = $shalat_fardhu ? implode(",", $shalat_fardhu) : $shalat_fardhu;

        // Count shalat fardhu = 5
        $this->countShalatFardhu = $shalat_fardhu ? count($shalat_fardhu) : $countShalatFardhu; 

        // Avg
        $this->avgShalatFardhu = ($this->countShalatFardhu/$this->standardValue->shalat['fardhu']);

        return $this;
    }

    /**
     * processShalatRawatib
     * 
     * @return object
     */
    protected function processShalatRawatib($shalat_rawatib = NULL)
    {
        $this->isShalatRawatib = !is_null($shalat_rawatib) ? 8 : NULL;

        $this->avgShalatRawatib = ($this->isShalatRawatib/$this->standardValue->shalat['rawatib']);

        return $this;
        
    }

    /**
     * processShalatTahajjud
     * 
     * @return object
     */
    protected function processShalatTahajjud($shalat_tahajjud = NULL)
    {
        $this->isShalatTahajjud = !is_null($shalat_tahajjud) ? 1 : NULL;

        $this->avgShalatTahajjud = ($this->isShalatTahajjud/$this->standardValue->shalat['tahajjud']);

        return $this;
    }

    /**
     * processShalatDhuha
     * 
     * @return object
     */
    protected function processShalatDhuha($shalat_dhuha = NULL)
    {
        $this->isShalatDhuha = !is_null($shalat_dhuha) ? 1 : NULL;

        $this->avgShalatDhuha = ($this->isShalatDhuha/$this->standardValue->shalat['dhuha']);

        return $this;
    }
}
