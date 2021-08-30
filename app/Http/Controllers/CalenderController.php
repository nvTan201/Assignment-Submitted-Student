<?php

namespace App\Http\Controllers;

use App\Calender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalenderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Calender::whereDate('postingTime', '>=', $request->postingTime)
                ->whereDate('deadlineSubmission',   '<=', $request->deadlineSubmission)
                ->get(['idExercise', 'question', 'postingTime', 'deadlineSubmission']);
            return response()->json($data);
        }
        return view('calender.index');
    }

    public function calendarEvents(Request $request)
    {

        switch ($request->type) {
            case 'create':
                $event = Calender::create([
                    'question' => $request->question,
                    'postingTime' => $request->postingTime,
                    'deadlineSubmission' => $request->deadlineSubmission,
                ]);

                return response()->json($event);
                break;

            case 'edit':
                $event = Calender::find($request->id)->update([
                    'question' => $request->question,
                    'postingTime' => $request->postingTime,
                    'deadlineSubmission' => $request->deadlineSubmission,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Calender::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # ...
                break;
        }
    }
}
