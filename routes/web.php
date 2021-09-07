<?php

// use App\Http\Controllers\ExerciseFinishController;

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CalenderController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CalenderController;
use App\Http\Middleware\CheckLogged;

use App\Http\Middleware\CheckLogin;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Round;

// use App\Http\Controllers\GradeController;
// use App\Http\Controllers\GradeController1;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([CheckLogged::class])->group(function () {
    Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::post('/loginPro', [AuthenticateController::class, 'loginPro'])->name('loginPro');
});
//authentication


Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('grade', GradeController::class);
    Route::resource('student', StudentController::class);
    Route::resource('ExerciseFinish', ExerciseFinishController::class);
    Route::resource('Exercise', ExerciseController::class);


    Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');

    //đăng file
    Route::name('file.')->group(function () {
        Route::get('/form', [FileController::class, 'view-form'])->name('view-form');
        // Route assigned name "admin.users"...
        Route::post('/upload-file', [FileController::class, 'uploadFile'])->name('upload-file');
        Route::get('/get-all-file', [FileController::class, 'getAllFile'])->name('get-all-file');
        Route::post('/dowload-file', [FileController::class, 'dowloadFile'])->name('dowload-file');
    });

    Route::resource('Points', PointsController::class);

    Route::get('/calendar-event', [CalenderController::class, 'index']);
    Route::post('calendar-crud-ajax', [CalenderController::class, 'calendarEvents']);
});

// Route::get('grade/create', [GradeController::class, 'create']);
// Route::post('grade/store', [GradeController::class, 'store']);

//hoc sinh
