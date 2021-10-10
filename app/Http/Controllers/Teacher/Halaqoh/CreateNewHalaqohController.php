<?php

namespace Controllers\Teacher\Halaqoh;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Requests\Teacher\Halaqoh\StoreHalaqohRequest;

/* Models */
use App\Models\HalaqohHistory;
use App\Models\Teacher;
use App\Models\User;

class CreateNewHalaqohController extends Controller
{
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

        return view('teacher.halaqoh.new-halaqoh');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHalaqohRequest $request)
    {

        $request->validated();

        /* Teacher Model */
        $teacherModel = User::find(auth()->user()->id)->teachers;

        try {
            HalaqohHistory::create([
                'student_id'    => $request->student,
                'surah_id'      => $request->surah,
                'teacher_id'    => $teacherModel->id,
                'fluency_level' => $request->fluency_level,
                'comment'       => $request->comment,
                'ayat_start'    => $request->ayat_start,
                'ayat_end'      => $request->ayat_end,

            ]);

            return redirect()->back()->with('message', [
                'message' => 'Berhasil setor halaqoh',
                'type' => 'success',
            ]);
        } catch (QueryException $th) {
            return back()->withErrors(['error' => 'Kesalahan internal hubungi bantuan (404)']);
        }

        /* if($validated)
        {
            echo 'berhasil bebs';
        } */
        //dd($request);
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
