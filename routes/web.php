<?php

use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Proximity\Auth\RegisterController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherDashController;
use Illuminate\Support\Facades\Route;

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

Route::post('/logout',function (){
    Auth::logout();
    return redirect()->route('prox-login');
})->name('logout');

Route::get('/', function () {
    return view('welcome');
})->name('prox-homepage');

Route::get('/login', function () {
    return view('Prøxïmïtÿ.Auth.login');
})->name('prox-login');

Route::get('/register', function () {
    return view('Prøxïmïtÿ.Auth.register');
})->name('prox-register');

Route::group(['middleware' => 'auth'],function (){

    Route::group(['prefix' => 'admin' ,'middleware' => 'adminAccess'],function (){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/students', [StudentsController::class, 'index'])->name('admin.students');
        Route::get('/teachers', [TeacherController::class, 'index'])->name('admin.teachers');
        Route::get('/courses', [CoursesController::class, 'index'])->name('admin.courses');
        Route::get('/teacher-assignment', [TeacherController::class, 'teacherAssignment'])->name('admin.teacher-assignment');
        Route::get('/student-assignment', [StudentsController::class, 'studentAssignment'])->name('admin.student-assignment');
    });

    Route::group(['prefix' => 'student','middleware' => 'studentAccess'],function(){

        Route::get('/dashboard',[StudentController::class,'index'])->name('student.dashboard');

    });

    Route::group(['prefix' => 'teacher','middleware' => 'teacherAccess'],function(){

        Route::get('/dashboard',[TeacherDashController::class,'index'])->name('teacher.dashboard');

    });


});





