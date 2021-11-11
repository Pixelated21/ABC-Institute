<?php

namespace App\Http\Livewire;

use App\Models\student;
use App\Models\teacher;
use App\Models\User;
use Hash;
use Livewire\Component;

class AdminTeachers extends Component
{

    public User $user;
    public teacher $teacher;
    public $password;
    public $editMode;

    protected $rules = [
        'user.email' => 'required|unique:users,email',
        'teacher.fname' => 'required',
        'teacher.lname' => 'required',
        'password' => 'required'
    ];

    public function updated() {
        $this->validate();
    }


    public function addTeacherViewOpen(){
        $this->dispatchBrowserEvent('add-teacher-open');
    }

    public function editTeachersView($teacher) {
        $this->editMode = $teacher;
        $this->teacher->fname = $teacher['fname'];
        $this->teacher->lname = $teacher['lname'];
        $this->dispatchBrowserEvent('edit-teacher-open');
    }

    public function updateTeacher(){

        teacher::find($this->editMode['id'])->update([
            'fname' => $this->teacher->fname,
            'lname' => $this->teacher->lname
        ]);

        $this->dispatchBrowserEvent('edit-teacher-close');

    }


    public function addTeacher(){

        $this->validate();

        $user = User::create([
            'email' => $this->user->email,
            'password' => Hash::make($this->password),
            'role_id' => 2
        ]);

        teacher::create([
            'user_id' => $user->id,
            'fname' => $this->teacher->fname,
            'lname' => $this->teacher->lname,
        ]);


        $this->dispatchBrowserEvent('add-teacher-close');


    }

    public function mount(){
        $this->user = new User();
        $this->teacher = new teacher();
    }

    public function render()
    {
        return view('livewire.admin-teachers',[
            'teachers' => teacher::paginate(5)
        ]);
    }
}
