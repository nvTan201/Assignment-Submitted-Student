<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercise;
use Illuminate\Support\Facades\DB;
use Exception;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $exercises = Exercise::all();
        // $search = $request->get('search');
        // SELECT * FROM `exercise` INNER JOIN grade ON grade.idGrade= exercise.idGrade WHERE exercise.idGrade
        // $exercises = Exercise::where('question', 'like', "%$search%")->paginate(1);

        $exercises = DB::table('exercise')
            ->join('grade', 'exercise.idGrade', '=', 'grade.idGrade')
            ->select('grade.*', 'exercise.*')
            ->orderBy('idExercise', 'DESC')
            ->get();


        // return $exercises;
        return view('Exercise.index', [
            "exercises" => $exercises
            // 'search' => $search

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // $grade = Grade::$grade = Grade::where('idGrade', '=', $id)->first();
        $exercise = exercise::find($id);
        // return $exercise;

        return view('Exercise.show', [
            "exercises" => $exercise,

        ]);
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
