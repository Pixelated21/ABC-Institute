<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(){
        return view('Admin.students');
    }

    public function studentAssignment(){
        return view('Admin.studentAssignment');
    }
}
