<?php

namespace App\Http\Livewire\Student;

use App\Models\group;
use Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.student.dashboard',
        [
            'schedules' => group::with('course')->where('student_id',Auth::user()->student->id)->paginate(5)
        ]);
    }
}
