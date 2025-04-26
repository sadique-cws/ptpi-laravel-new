<?php

namespace App\Livewire\Public\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("layouts.loginLayout")]
class RecruiterSignup extends Component
{
    public function render()
    {
        return view('livewire.public.pages.recruiter-signup');
    }
}
