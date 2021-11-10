<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        return view('Admin.teachers');
    }

    public function teacherAssignment(){
        return view('Admin.teacherAssignment');
    }
}
