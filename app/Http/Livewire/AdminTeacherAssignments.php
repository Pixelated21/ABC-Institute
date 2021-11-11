<?php

namespace App\Http\Livewire;

use App\Models\course;
use App\Models\student;
use App\Models\teacher;
use App\Models\teacherAssignment;
use Livewire\Component;

class AdminTeacherAssignments extends Component
{
    public $teacher_id;
    public $course_id;
    public $days;
    public $start;
    public $end;


    protected $rules = [
      'teacher_id' => 'required',
      'course_id' => 'required',
        'days' => 'required',
        'start' => 'required',
        'end' => 'required'
    ];

    public function updated(){
        $this->validate();
    }

    public function assignCourseView(){
        $this->dispatchBrowserEvent('assign-course-open');
    }

    public function assignCourse(){

        teacherAssignment::create([
           'teacher_id' => $this->teacher_id,
           'course_id' => $this->course_id,
            'days' => $this->days,
            'start' => $this->start,
            'end' => $this->end
        ]);

        $this->dispatchBrowserEvent('assign-course-close');

    }



    public function render()
    {
        return view('livewire.admin-teacher-assignments',[
            'teacher_assignments' => teacherAssignment::paginate(5),
            'teachers' => teacher::all(),
            'courses' => course::all(),
        ]);
    }
}
