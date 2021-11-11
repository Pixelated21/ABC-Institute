<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherDashController extends Controller
{
    public function index(){
        return view('Teacher.teacher-dashboard');
    }
}
