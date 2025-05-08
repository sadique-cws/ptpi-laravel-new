<?php

namespace App\Livewire\Admin\Pages;

use App\Models\ClassCategory;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.adminLayout')]
class ManageCategory extends Component
{
    use WithPagination;

    #[Validate( 'required|string|max:255')]
    public $cat_title = '';
    #[Validate('nullable|string|max:255')]
    public $cat_description = '';
    public $isModalOpen = false;
    public $editingCategoryId = null;
    public $perPage = 10;
    public $search = '';


    public function storeOrUpdate()
    {
        $data = $this->validate();

        if ($this->editingCategoryId) {
            $category = ClassCategory::find($this->editingCategoryId);
            if ($category) {
                $category->update($data);
            }
        } else {
            ClassCategory::create($data);
        }

        $this->resetForm();
    }
    public function edit($id)
    {
        $category = ClassCategory::find($id);

        if ($category) {
            $this->editingCategoryId = $category->id;
            $this->cat_title = $category->cat_title;
            $this->cat_description = $category->cat_description;
            $this->isModalOpen = true;
        }
    }

    public function destroy($id)
    {
        $category = ClassCategory::find($id);
        if ($category) {
            $category->delete();
            $this->dispatch('notice', type: 'info', text: 'Category deleted successfully!');
        }
    }

    public function openModal()
    {
        $this->resetForm();
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->isModalOpen = false;
    }

    private function resetForm()
    {
        $this->reset(['cat_title', 'cat_description', 'editingCategoryId', 'isModalOpen']);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = ClassCategory::where('cat_name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);
        return view('livewire.admin.pages.manage-category', compact('categories'));
    }
}
