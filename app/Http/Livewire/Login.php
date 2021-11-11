<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
      'email' => 'required',
      'password' => 'required'
    ];

    public function updated(){
        $this->validate();
    }

    public function authenticate(){
        $this->validate();

        if(Auth::attempt($this->validate())){
            $this->dispatchBrowserEvent('auth-success');
            sleep(2);

            if(Auth::user()->role_id === 3){
                return redirect()->route('student.dashboard');
            }
            if (Auth::user()->role_id === 2) {
                return redirect()->route('teacher.dashboard');
            }
            if (Auth::user()->role_id === 1) {
                return redirect()->route('admin.dashboard');
            }

        }
       $this->dispatchBrowserEvent('auth-failed');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
