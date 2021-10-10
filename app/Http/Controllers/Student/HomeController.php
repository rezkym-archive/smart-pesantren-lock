<?php

namespace Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\MutabaahAchievement;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        // Get student
        $student = Student::with(["MutabaahAchievements" => function($q){
            return $q->whereMonth('created_at', today()->format('m'));
        }])->where('user_id', auth()->user()->id)->first();

        // Student relation to Mutabaah Achievement
        $myAchievement = $student->MutabaahAchievements->first();
        
        // Get cinta shalat from myAchievement
        $cinta_shalat = $myAchievement->cinta_shalat ?? 0;
        // render
        return view('student.dashboard', [
            'my_achievement' => [
                'cinta_shalat' => number_format($cinta_shalat, 1, ',', ''),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
