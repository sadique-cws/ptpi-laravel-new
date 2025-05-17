<?php

namespace App\Livewire\Teacher\Component;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $user;
    
    public function mount()
    {
         $this->user = Auth::user();
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.teacher.component.header');
    }
}
