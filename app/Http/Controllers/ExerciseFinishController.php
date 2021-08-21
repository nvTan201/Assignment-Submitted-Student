<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\ExerciseFinish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExerciseFinishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ExerciseFinish.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Exercise.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $idExercise = $request->get('idExercise');
        $student = session()->get('id');
        $text = $request->get('text');
        $responseTime = $request->get('responseTime');
        $title = $request->get('title');
        $status = $request->get('status');
        // dd($request->get('title'));
        $exerciseFinish = new ExerciseFinish();
        $exerciseFinish->idExercise = $idExercise;
        $exerciseFinish->idStudent = $student;
        $exerciseFinish->exerciseFinish = $text;
        $exerciseFinish->responseTime = $responseTime;
        $exerciseFinish->title = $title;
        $exerciseFinish->status = $status;
        $exerciseFinish->save();
        return redirect()->route('file.get-all-file')->with('error', [
            "message" => 'đăng thành công'
        ]);
        // return $request;
        // return Redirect::route("file.get-all-file");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exerciseFinish = ExerciseFinish::find($id);
        // return $exerciseFinish;

        return view('exerciseFinish.show', [
            "exerciseFinishs" => $exerciseFinish

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
