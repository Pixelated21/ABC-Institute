<?php

namespace App\Http\Livewire;

use App\Models\course;
use Livewire\Component;

class AdminCourses extends Component
{
    public course $course;
    public $editMode;

    protected $rules = [
        'course.course_nm' => 'required|unique:courses,course_nm',
        'course.days' => 'required',
        'course.start' => 'required',
        'course.end' => 'required'
    ];

    public function updated()
    {
        $this->validate();
    }

    public function addCourseViewOpen()
    {
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
            'days' => $this->course->days,
            'start' => $this->course->start,
            'end' => $this->course->end

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

        course::find($this->editMode['id'])
            ->update([
                'course_nm' => $this->course->course_nm,
                'days' => $this->course->days,
                'start' => $this->course->start,
                'end' => $this->course->end,
            ]);

        $this->editMode = false;
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
