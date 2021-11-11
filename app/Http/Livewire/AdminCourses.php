<?php

namespace App\Http\Livewire;

use App\Models\course;
use Livewire\Component;

class AdminCourses extends Component
{
    public course $course;
    public $editMode;

    protected $rules = [
        'course.course_nm' => 'required',

    ];

    public function updated()
    {
        if (!$this->editMode === null) {
            $this->validate([
                'course.course_nm' => 'required',
            ]);
        }
        $this->validate();

    }

    public function addCourseViewOpen()
    {
        $this->editMode = null;
        $this->course->course_nm = '';
        $this->dispatchBrowserEvent('add-course-open');
    }

    public function mount()
    {
        $this->course = new course;
    }

    public function addCourse()
    {
        course::create([
            'course_nm' => $this->course->course_nm,
        ]);
        $this->dispatchBrowserEvent('add-course-close');
        $this->dispatchBrowserEvent('course-added-successfully');

    }

    public function editCoursesView($course)
    {
        $this->editMode = $course;
        $this->dispatchBrowserEvent('edit-course-open');
        $this->course->course_nm = $course['course_nm'];

    }

    public function updateCourse()
    {
        $this->validate([
            'course.course_nm' => 'required|unique:courses,course_nm',

        ]);
        course::find($this->editMode['id'])
            ->update([
                'course_nm' => $this->course->course_nm,

            ]);

        $this->editMode = null;
        $this->dispatchBrowserEvent('edit-course-close');
        $this->dispatchBrowserEvent('course-updated-success');


    }

    public function deleteCourse($course)
    {
        course::find($course['id'])->delete();

        $this->dispatchBrowserEvent('course-deleted-successfully');

    }

    public function render()
    {
        return view('livewire.admin-courses', [
            'courses' => course::paginate(5)
        ]);
    }
}
