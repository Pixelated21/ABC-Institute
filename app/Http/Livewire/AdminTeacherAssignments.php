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


    protected $rules = [
      'teacher_id' => 'required',
      'course_id' => 'required',
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
        ]);

        $this->dispatchBrowserEvent('assign-course-close');

    }

    public function deleteTeacher($teacher){
     teacherAssignment::find($teacher['id'])->delete();
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
