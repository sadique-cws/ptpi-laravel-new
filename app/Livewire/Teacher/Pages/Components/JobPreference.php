<?php

namespace App\Livewire\Teacher\Pages\Components;

use App\Models\ClassCategory;
use App\Models\JobRole;
use App\Models\Subject;
use App\Models\TeacherPreference;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class JobPreference extends Component
{
    public $showModal = false;
    public $categories;
    public $subjects = [];
    public $jobRoles;

    #[Validate('required|exists:class_categories,id')]
    public $category_id = '';

    #[Validate('required|exists:subjects,id')]
    public $subject_id = '';

    #[Validate('required|exists:job_roles,id')]
    public $job_role_id = '';


    public function mount()
    {
        $this->categories = ClassCategory::all();
        $data = $this->jobRoles = JobRole::all();
    }

    public function updatedCategoryId($value)
    {
        // dd($value);
        if ($value) {
            $this->subjects = Subject::where('category_id', $value)->get();
        } else {
            $this->subjects = [];
        }
        $this->subject_id = '';
    }

    public function openModal()
    {
        $this->showModal = true;
        $this->reset(['category_id', 'subject_id', 'job_role_id']);
        $this->resetValidation();
    }

    public function savePreference()
    {
        $validated = $this->validate();

        TeacherPreference::create([
            'user_id' => Auth::id(),
            'category_id' => $validated['category_id'],
            'subject_id' => $validated['subject_id'],
            'job_role_id' => $validated['job_role_id']
        ]);

        $this->showModal = false;
        session()->flash('success', 'Preference added successfully!');
    }
    public function render()
    {
        return view('livewire.teacher.pages.components.job-preference',[
            'preferences' => TeacherPreference::with(['category', 'subject', 'jobRole'])
                ->where('user_id', Auth::id())
                ->latest()
                ->get()
        ]);
    }
}
