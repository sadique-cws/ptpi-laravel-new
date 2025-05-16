<?php

namespace App\Livewire\Admin\Pages;

use App\Models\JobRole;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.adminLayout')]
class ManageJobRole extends Component
{
    #[Validate('required|min:3|max:255|unique:job_roles')]
    public $role_name = '';
    public $showModal = false;
    public $jobRoleId = null;
    public $jobRoles = [];

    public function mount()
    {
        $this->jobRoles = JobRole::all();
    }

    public function createAndUpdateJobRole()
    {
        $data = $this->validate();
        if ($this->jobRoleId) {
            $jobRole = JobRole::find($this->jobRoleId);
            $jobRole->update($data);
            session()->flash('message', 'Job Role updated successfully.');
        } else {
            JobRole::create($data);
            session()->flash('message', 'Job Role created successfully.');
        }
        $this->resetInputFields();
    }
    public function resetInputFields()
    {
        $this->role_name = '';
        $this->jobRoleId = null;
        $this->showModal = false;
        $this->jobRoles = JobRole::all();
    }
    public function editJobRole($id)
    {
        $this->showModal = true;
        $this->jobRoleId = $id;
        $jobRole = JobRole::find($id);
        $this->role_name = $jobRole->role_name;
    }
    public function deleteJobRole($id)
    {
        $jobRole = JobRole::find($id);
        if ($jobRole) {
            $jobRole->delete();
            session()->flash('message', 'Job Role deleted successfully.');
        } else {
            session()->flash('error', 'Job Role not found.');
        }
        $this->jobRoles = JobRole::all();
    }
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetInputFields();
    }
    public function openModal()
    {
        $this->showModal = true;
    }
    public function render()
    {
        return view('livewire.admin.pages.manage-job-role');
    }
}
