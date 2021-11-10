<?php

namespace App\Http\Livewire;

use App\Models\course;
use App\Models\group;
use App\Models\student;
use Livewire\Component;

class AdminStudentAssignments extends Component
{
    public $student_id;
    public $course_id;

    public function assignCourseView(){
        $this->dispatchBrowserEvent('assign-course-open');
    }

    public function assignCourse(){
        group::create([
           'course_id' => $this->course_id,
           'student_id'  => $this->student_id
        ]);
    }


    public function render()
    {
        return view('livewire.admin-student-assignments',[
            'group' => group::paginate(5),
            'courses' => course::all(),
            'students' => student::all(),
        ]);
    }
}
