<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class PublicHeader extends Component
{
    public $mobileMenuOpen = false;
    public $dropdownOpen = false;
    public $user;
    public $isLoggedIn = false;

    public function mount()
    {
        $this->user = Auth::user();
        $this->isLoggedIn = Auth::check();
    }
    
    public function toggleMobileMenu()
    {
        $this->mobileMenuOpen = !$this->mobileMenuOpen;
    }

    public function toggleDropdown()
    {
        $this->dropdownOpen = !$this->dropdownOpen;
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        
        return redirect()->route('login');
    }

    public function getRoleDisplay()
    {
        return ucfirst($this->user?->role->value ?? '');
    }

    public function render()
    {
        return view('livewire.components.public-header');
    }
}
