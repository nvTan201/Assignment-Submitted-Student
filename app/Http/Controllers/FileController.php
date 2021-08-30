<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Repsonse\Controllers;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\FileData;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
// use ResIlluminate\Http\Response;
class FileController extends Controller
{
    public function viewForm()
    {
        return view('Exercise.show');
    }
    public function uploadFile(Request $request)
    {

        $check = null;
        $file = $request->file('file');
        $student = session()->get('id');
        $idExercise = $request->get('idExercise');
        $responseTime = $request->get('responseTime');
        $deadline = $request->get('deadlineSubmission');
        $titleFinish = $request->get('titleFinish');
        // dd($title);
        // $status = $request->get('status');
        if ($responseTime <= $deadline) {
            $check = 0;
        } else {
            $check = 1;
        }
        $responseTime = $request->get('responseTime');
        $url = 'upload/' . $file->getClientOriginalName();
        $fileData = new FileData();
        $fileData->idExercise = $idExercise;
        $fileData->idStudent = $student;
        $fileData->responseTime = $responseTime;
        $fileData->exerciseFinish = $url;
        // $fileData->$check;
        $fileData->titleFinish = $titleFinish;
        // $fileData->status = $status;
        // dd($url);
        // return $request;
        $fileData->save();
        $file->move('upload', $file->getClientOriginalName());
        return Redirect::route("file.get-all-file")->with('error', [
            "message" => "Submission"
        ]);
    }
    public function getAllFile()
    {
        $files = FileData::join('exercise', 'exercise.idExercise', '=', 'exercise_finish.idExercise')
            ->select('exercise_finish.*', 'exercise.*')->get();
        return view('exerciseFinish.index', ['files' => $files]);
        // return view('ExerciseFinish.index');
        // return $files;
    }

    public function dowloadFile(Request $request)
    {

        $path = $request->get('file');
        dd($request->file('file'));
        $filePath = public_path($path);
        // dd($filePath);
        return Response::dowload($filePath);
        // return response()->download(public_path($path));
        // dd($request->get('fileData'));

    }
}
