<?php

namespace App\Livewire\Admin\Pages;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
#[Layout('layouts.adminLayout')]
class ClassCategory extends Component
{
    use WithPagination;

    #[Validate('required|min:3|max:255')]
    public $title = '';

    #[Validate('nullable|max:500')]
    public $description = '';

    public $isOpen = false;
    public $editMode = false;
    public $categoryId;

    public function create()
    {
        $this->resetForm();
        $this->editMode = false;
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate();

        \App\Models\ClassCategory::create([
            'title' => $this->title,
            'description' => $this->description
        ]);

        session()->flash('success', 'Category created successfully.');
        $this->resetForm();
        $this->isOpen = false;
    }

    public function edit($id)
    {
        $category = \App\Models\ClassCategory::findOrFail($id);
        $this->categoryId = $id;
        $this->title = $category->title;
        $this->description = $category->description;
        $this->editMode = true;
        $this->isOpen = true;
    }

    public function update()
    {
        $this->validate();

        $category = \App\Models\ClassCategory::findOrFail($this->categoryId);
        $category->update([
            'title' => $this->title,
            'description' => $this->description
        ]);

        session()->flash('success', 'Category updated successfully.');
        $this->resetForm();
        $this->isOpen = false;
    }

    public function delete($id)
    {
        \App\Models\ClassCategory::findOrFail($id)->delete();
        session()->flash('success', 'Category deleted successfully.');
    }

    private function resetForm()
    {
        $this->reset(['title', 'description', 'categoryId']);
        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.admin.pages.class-category', [
            'categories' => \App\Models\ClassCategory::latest()->paginate(10)
        ]);
    }
}
