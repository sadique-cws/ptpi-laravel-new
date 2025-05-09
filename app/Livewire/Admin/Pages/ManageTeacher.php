<?php

namespace App\Livewire\Admin\Pages;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.adminLayout')]
class ManageTeacher extends Component
{
    use WithPagination;

    public $isViewModalOpen = false;
    public $selectedTeacher = null;

    public function viewTeacher($id)
    {
        $this->selectedTeacher = User::findOrFail($id);
        $this->isViewModalOpen = true;
    }

    public function closeModal()
    {
        $this->isViewModalOpen = false;
        $this->selectedTeacher = null;
    }

    public function render()
    {
        $teachers = User::where('role', 'teacher')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.pages.manage-teacher', compact('teachers'));
    }
}
