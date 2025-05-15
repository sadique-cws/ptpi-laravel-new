<?php

namespace App\Livewire\Public\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout("layouts.loginLayout")]
class LoginPage extends Component
{
    #[Validate("required")]
    public $email;
    #[Validate("required")]
    public $password;


    public function login(){
      $data= $this->validate();
      if(Auth::attempt($data)){
        return redirect()->route('teacher.dashboard')->with('success', 'Login successful!');
      }else{
        return redirect()->back();
      }

    }
    public function render()
    {
        return view('livewire.public.pages.login-page');
    }
}
