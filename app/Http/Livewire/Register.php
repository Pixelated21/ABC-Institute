<?php

namespace App\Http\Livewire;

use App\Models\student;
use App\Models\User;
use Hash;
use Livewire\Component;

class Register extends Component
{
    public User $user;
    public student $student;
    public $password;

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

    public function createStudent(){

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

    }

    public function mount(){
        $this->user = new User();
        $this->student = new student();
    }

    public function render()
    {
        return view('livewire.register');
    }
}
