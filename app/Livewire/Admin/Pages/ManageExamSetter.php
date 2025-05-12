<?php

namespace App\Livewire\Admin\Pages;

use App\Models\ClassCategory;
use App\Models\ExamSetter;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.adminLayout')]
class ManageExamSetter extends Component
{
    use WithPagination;

    public $showModal = false;
    public $email = '';
    public $password = '';
    public $first_name = '';
    public $last_name = '';
    public $selectedCategory = '';
    public $selectedSubject = '';
    public $availableSubjects = [];

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
        $this->reset(['email', 'password', 'first_name', 'last_name', 'selectedCategory', 'selectedSubject']);
        $this->availableSubjects = [];
    }

    public function updatedSelectedCategory($value)
    {
        if ($value) {
            $this->availableSubjects = Subject::where('category_id', $value)->get();
        } else {
            $this->availableSubjects = [];
        }
        $this->selectedSubject = '';
        $this->dispatch('subjects-updated');
    }

    public function createExamSetter()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'selectedCategory' => 'required|exists:class_categories,id',
            'selectedSubject' => 'required|exists:subjects,id',
        ]);

        $user = User::create([
            'email' => $this->email,
            'password' => $this->password, 
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'role' => 'examsetter',
        ]);

        ExamSetter::create([
            'user_id' => $user->id,
            'category_id' => $this->selectedCategory,
            'subject_id' => $this->selectedSubject,
        ]);

        $this->toggleModal();
        session()->flash('message', 'Exam setter created successfully.');
    }

    public function render()
    {
        return view('livewire.admin.pages.manage-exam-setter', [
            'examSetters' => ExamSetter::with(['user', 'category', 'subject'])
                ->paginate(10),
            'categories' => ClassCategory::all(),
        ]);
    }
}
