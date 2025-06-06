<?php

namespace App\Livewire\Teacher\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    public $user;

    public function mount(){
        $this->user = Auth::user();
    }
    public function logout(){
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.teacher.components.sidebar');
    }
}
