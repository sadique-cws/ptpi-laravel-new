<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.adminLayout')]
class ManageRecruiter extends Component
{
    public function render()
    {
        return view('livewire.admin.pages.manage-recruiter');
    }
}
