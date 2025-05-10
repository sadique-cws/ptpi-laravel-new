<?php

namespace App\Livewire\Recruiter\Components;

use Livewire\Component;

class Header extends Component
{
    public $search = '';
    public $showMobileMenu = false;
    public $showProfileMenu = false;

    public function toggleMobileMenu()
    {
        $this->showMobileMenu = !$this->showMobileMenu;
        $this->dispatch('sidebar-toggle', $this->showMobileMenu);
    }
    public function toggleProfileMenu()
    {
        $this->showProfileMenu = !$this->showProfileMenu;
    }

    public function updatedSearch()
    {
        $this->dispatch('search-updated', $this->search);
    }
    public function render()
    {
        return view('livewire.recruiter.components.header');
    }
}
