<?php

namespace App\Http\Livewire;

use App\Models\student;
use App\Models\User;
use Hash;
use Livewire\Component;
use Livewire\WithPagination;

class AdminStudents extends Component
{
    use WithPagination;
    public User $user;
    public student $student;
    public $password;
    public $editMode;

    protected $rules = [
        'user.email' => 'required|unique:users,email',
        'student.fname' => 'required',
        'student.lname' => 'required',
        'student.age' => 'required',
        'student.gender' => 'required',
        'student.phone_nbr' => 'required|unique:students,phone_nbr',
        'password' => 'required'
    ];

    public function updated() {
        $this->validate();
    }


    public function addStudentViewOpen(){
            $this->student->fname = '';
            $this->student->lname = '';
            $this->student->age = '';
            $this->student->gender = '';
            $this->student->phone_nbr = '';
            $this->user->email = '';
            $this->user->password = '';
        $this->dispatchBrowserEvent('add-student-open');
    }

    public function editStudentsView($student){
        $this->editMode = $student;
        $this->student->fname = $student['fname'];
        $this->student->lname = $student['lname'];
        $this->student->gender = $student['gender'];
        $this->student->age = $student['age'];
        $this->user->email = $student['user']['email'];

        $this->dispatchBrowserEvent('edit-student-open');
    }

    public function updateStudent(){



    }

    public function deleteStudent($student){

        student::find($student['id'])->delete();
    }


    public function addStudent(){

        $this->validate();

        $user = User::create([
            'email' => $this->user->email,
            'password' => Hash::make($this->password),
        ]);

        student::create([
            'user_id' => $user->id,
            'fname' => $this->student->fname,
            'lname' => $this->student->lname,
            'age' => $this->student->age,
            'gender' => $this->student->gender,
            'phone_nbr' => $this->student->phone_nbr,
        ]);


        $this->dispatchBrowserEvent('add-student-close');


    }

    public function mount(){
        $this->user = new User();
        $this->student = new student();
    }

    public function render()
    {
        return view('livewire.admin-students',[
            'students' => student::paginate(5)
        ]);
    }
}
