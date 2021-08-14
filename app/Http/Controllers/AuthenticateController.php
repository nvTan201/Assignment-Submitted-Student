<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

use App\Student;
use Exception;

use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginPro(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        // return $request;
        //firstOrFail bat loi
        try {
            $student = Student::where('emailStudent', $email)->where('passwordStudent', $password)->firstOrFail();
            $request->session()->put('id', $student->idStudent);
            $request->session()->put('lastNameStudent', $student->lastNameStudent);

            return Redirect::route('dashboard');

            // return $student;
        } catch (Exception $e) {
            return Redirect::route("login")->with('error', [
                "message" => 'đăng nhập lỗi ',
                "email" => $email,
            ]);
        }
    }
    public function logout(Request $request)
    {
        //xóa session
        $request->session()->flush();
        //điều hướng
        return Redirect::route("login");
    }
}
