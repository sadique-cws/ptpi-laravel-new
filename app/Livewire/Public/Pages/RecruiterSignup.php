<?php

namespace App\Livewire\Public\Pages;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout("layouts.loginLayout")]
class RecruiterSignup extends Component
{
    #[Validate('required|string|max:255')] 
    public $Fname;
    #[Validate('required|string|max:255')]
    public $Lname;
    #[Validate('required|email|unique:users,email')]
    public $email;
    #[Validate('required|string|min:8|regex:/[0-9]/|regex:/[^A-Za-z0-9]/')]
    public $password;
    

    public function register(){
        $this->validate();

        try {
            $user = User::create([
                'first_name' => $this->Fname,
                'last_name' => $this->Lname,
                'email' => $this->email,
                'password' => $this->password,
                'role' => 'recruiter',
            ]);

            return redirect()->route('teacher.profile')->with('success', 'Registration successful!');
        }
        catch (\Exception $e) {
            $this->addError('general', 'An error occurred during registration. Please try again.');
        };
    }
    public function render()
    {
        return view('livewire.public.pages.teacher-signup');
    }
}
