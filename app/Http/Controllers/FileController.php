<?php

namespace App\Http\Controllers;

use App\FileData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FileController extends Controller
{
    public function viewForm()
    {
        return view('Exercise.show');
    }
    public function uploadFile(Request $request)
    {
        // dd($request);
        // return $request;
        $student = session()->get('id');
        $idExercise = $request->get('idExercise');
        $file = $request->file('file');
        $responseTime = $request->get('responseTime');
        $url = 'upload' . $file->getClientOriginalName();
        $fileData = new FileData();
        $fileData->idExercise = $idExercise;
        $fileData->idStudent = $student;
        $fileData->responseTime = $responseTime;
        $fileData->exerciseFinish = $url;

        // $fileData->$fileUrl = $url;
        $fileData->save();
        $file->move('upload', $file->getClientOriginalName());
        // return 'Suscessfully uploaded';
        return Redirect()->route("file.get-all-file");
    }
    public function getAllFile()
    {
        $files = FileData::all();
        return view('exerciseFinish.index', [
            "files" => $files
        ]);
    }

    public function dowloadFile(Request $request)
    {
        dd($request);
    }
}
