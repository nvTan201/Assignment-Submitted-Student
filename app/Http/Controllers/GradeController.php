<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Redirect;
// use Grade;
use Illuminate\Http\Request;
use App\Grade;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return view('grade.create');
        // $grades = Grade::all();
        # all => lấy tất cả bản ghi
        # paginate => phân trang
        $search = $request->get('search');
        $grades = Grade::where('nameGrade', 'like', "%$search%")->paginate(1);

        return view('grade.index', [
            "grades" => $grades,
            'search' => $search

        ]);
        // return $grades;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nameGrade = $request->get('nameGrade');
        $course = $request->get('course');
        // DB::insert("INSERT INTO grade(nameGrade,course) VALUES ('$nameGrade',$course)");grade
        // DB::table('major')->insert([
        //     "nameMajor" => $name
        // ]); # Query builder
        $grade = new Grade();
        $grade->nameGrade = $nameGrade;
        $grade->course = $course;
        $grade->save();
        return redirect()->route('grade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $grades = DB::table('grade')
            ->join('exercise', 'grade.idGrade', '=', 'exercise.idGrade')
            ->select('grade.*', 'exercise.*')
            ->where('grade.idGrade', '=', $id)
            ->get();


        // return $grades;
        return view('grade.show', [
            "grades" => $grades,
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
        $grade = Grade::find($id);
        return view('grade.edit', [
            "grade" => $grade
        ]);
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
        $grade = Grade::find($id);
        $grade->nameGrade = $request->get('nameGrade');
        $grade->course = $request->get('course');
        $grade->save();
        return redirect()->route('grade.index');
        // return $grade;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::find($id)->delete();
        return redirect()->route('grade.index');
    }
}
