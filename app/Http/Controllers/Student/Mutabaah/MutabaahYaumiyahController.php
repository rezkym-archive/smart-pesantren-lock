<?php

namespace Controllers\Student\Mutabaah;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\MutabaahYaumiyahRequest;
use App\Models\Mutabaah;
use App\Models\MutabaahAchievement;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Traits\Student\ActionMutabaahYaumiyahTrait;

class MutabaahYaumiyahController extends Controller
{
    use ActionMutabaahYaumiyahTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.mutabaah.new-mutabaah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MutabaahYaumiyahRequest $request)
    {
        //$this->getStudent();

        return $this->initAction($request);
        
        


        /* // Set default request shalat_fardhu
        $shalat_fardhu = $request->shalat_fardhu ?? NULL;

        // Set default countShalatFardhu
        $countShalatFardhu = 0;

        // Procced the data
        try {
            
            $studentDB = Student::where('user_id', auth()->user()->id)->first();

            // Check if user has attend the mutabaah today
            $todayAttend = Mutabaah::where('student_id', $studentDB->id)
                ->whereDate('created_at', today())
                ->first();

            if (!is_null($todayAttend)) {
                return back()->withErrors(['error' => 'Hari ini udah ngisi MY sob! 🤩']);
            }

            // Standart value mutabaah
            //$request->validated();
            

            // Convert shalat fardhu from array to comma separated list
            $convertShalatFardhu = $shalat_fardhu ? implode(",", $shalat_fardhu) : $shalat_fardhu;

            // Count rakaat shalat fardhu
            $countShalatFardhu = $shalat_fardhu ? count($shalat_fardhu) : $countShalatFardhu;

            Mutabaah::create([
                'student_id'    => $studentDB->id,
                'shalat_fardhu' => $convertShalatFardhu,
            ]);

            $mutabaahAchievement = MutabaahAchievement::where([
                ['student_id', $studentDB->id],
                ['expired_at', '>', now()->format('Y-m-d')]
            ])->first();

            if ($mutabaahAchievement) {

                $mutabaahAchievement->shalat_fardhu += $countShalatFardhu;
                $mutabaahAchievement->save();
            } else {

                MutabaahAchievement::create([
                    'student_id'   => $studentDB->id,
                    'shalat_fardhu' => $countShalatFardhu,
                    'expired_at'    => now()->addDays(21)->format('Y-m-d'),
                ]);
            }

            return redirect()->back()->with('message', [
                'message' => 'Yeay Mutabaah kamu sudah di isi hari ini 😎',
                'type' => 'success',
            ]);
        } catch (QueryException $th) {
            return back()->withErrors(['error' => 'Kesalahan internal hubungi bantuan (404) [' . $th->getMessage() . ']']);
        } */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
