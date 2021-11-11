<?php

namespace App\Http\Livewire\Teacher;

use App\Models\teacherAssignment;
use Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
//        dd(Auth::user()->teacher->id);
//        dd(teacherAssignment::where('teacher_assignments.teacher_id',Auth::user()->teacher->id)->get());
        return view('livewire.teacher.dashboard',
        [
            'schedules' => teacherAssignment::where('teacher_assignments.teacher_id',Auth::user()->teacher->id)
            ->paginate(5)
        ]);
    }
}
