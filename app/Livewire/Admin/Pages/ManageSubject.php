<?php

namespace App\Livewire\Admin\Pages;

use App\Models\ClassCategory;
use App\Models\Subject;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.adminLayout')]
class ManageSubject extends Component
{
    use WithPagination;

    public $showModal = false;
    public $modalTitle = 'Add New Subject';
    public $editingSubjectId = null;

    #[Validate('required|exists:class_categories,id')]
    public $category_id = '';

    #[Validate('required|string|max:255')]
    public $name = '';

    public function openModal()
    {
        $this->resetForm();
        $this->modalTitle = 'Add New Subject';
        $this->editingSubjectId = null;
        $this->showModal = true;
    }

    public function editSubject($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);
        
        $this->category_id = $subject->category_id;
        $this->name = $subject->name;
        $this->editingSubjectId = $subjectId;
        $this->modalTitle = 'Edit Subject';
        $this->showModal = true;
    }

    public function saveSubject()
    {
        
        $data = $this->validate();

        if ($this->editingSubjectId) {
            $subject = Subject::findOrFail($this->editingSubjectId);
            $subject->update([
                'category_id' => $this->category_id,
                'name' => $this->name,
            ]);
            
            session()->flash('success', 'Subject updated successfully.');
        } else {
            Subject::create([
                'category_id' => $this->category_id,
                'title' => $this->name,
            ]);
            
            session()->flash('success', 'Subject created successfully.');
        }

        $this->closeModal();
    }

    public function deleteSubject($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);
        $subject->delete();
        
        session()->flash('success', 'Subject deleted successfully.');
    }


    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset('category_id', 'name', 'editingSubjectId');
        $this->resetErrorBag();
    }

    public function mount(){
        $category = ClassCategory::all();
    }
    public function render()
    {
        return view('livewire.admin.pages.manage-subject',
        [
            'subjects' => Subject::with('category')->latest()->paginate(10),
            'categories' => ClassCategory::all(),
        ]);
    }
}
