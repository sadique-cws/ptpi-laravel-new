<?php

namespace App\Livewire\Questionsetter\Components;

use Livewire\Component;

class Header extends Component
{
    public $showProfileMenu = false;

    public function toggleProfileMenu()
    {
        $this->showProfileMenu = !$this->showProfileMenu;
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.questionsetter.components.header');
    }
}
