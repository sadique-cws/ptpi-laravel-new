<?php

namespace App\Livewire\Admin\Pages;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.adminLayout')]
class ViewTeacher extends Component
{
    public User $teacher;

    public function mount($id)
    {
        $this->teacher = User::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.pages.view-teacher');
    }
}
