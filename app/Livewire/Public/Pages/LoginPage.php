<?php

namespace App\Livewire\Public\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

class LoginPage extends Component
{
    #[Layout("layouts.loginLayout")]

    public function render()
    {
        return view('livewire.public.pages.login-page');
    }
}
