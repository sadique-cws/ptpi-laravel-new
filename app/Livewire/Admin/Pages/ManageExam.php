<?php

namespace App\Livewire\Admin\Pages;

use App\Models\ClassCategory;
use App\Models\ExamSet;
use App\Models\Level;
use App\Models\Subject;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.adminLayout')]
class ManageExam extends Component
{
    public $examSets = [];
    public $categories = [];
    public $levels = [];
    public $subjects = [];
    public $isModalOpen = false;
    public $editingExamId = null;

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('nullable|string')]
    public $description = '';

    #[Validate('required|exists:class_categories,id')]
    public $category_id = '';

    #[Validate('required|string|max:255')]
    public $subject = '';

    #[Validate('required|exists:levels,id')]
    public $level_id = '';

    #[Validate('required|integer|min:0')]
    public $total_marks = 0;

    #[Validate('required|integer|min:1')]
    public $duration = 60;

    #[Validate('required|in:online,offline')]
    public $type = 'online';

    #[Validate('required|in:draft,published,archived')]
    public $status = 'draft';

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->examSets = ExamSet::with(['category', 'level'])->get();
        $this->categories = ClassCategory::all();
        $this->levels = Level::all();
        if ($this->category_id) {
        $this->subjects = Subject::where('category_id', $this->category_id)->get();
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

    public function edit($id)
    {
        $exam = ExamSet::find($id);
        if ($exam) {
            $this->editingExamId = $exam->id;
            $this->name = $exam->name;
            $this->description = $exam->description;
            $this->category_id = $exam->category_id;
            $this->subjects = Subject::where('category_id', $exam->category_id)->get();
            $this->subject = $exam->subject;
            $this->level_id = $exam->level_id;
            $this->total_marks = $exam->total_marks;
            $this->duration = $exam->duration;
            $this->type = $exam->type;
            $this->status = $exam->status;
            $this->isModalOpen = true;
        }
    }

    public function storeOrUpdate()
    {
        $validated = $this->validate();
        $validated['user_id'] = auth()->id();

        if ($this->editingExamId) {
            $exam = ExamSet::find($this->editingExamId);
            if ($exam) {
                $exam->update($validated);
            }
        } else {
            ExamSet::create($validated);
        }

        $this->loadData();
        $this->closeModal();
        session()->flash('success', $this->editingExamId ? 'Exam updated successfully!' : 'Exam created successfully!');
    }

    public function updatedCategoryId($value)
    {
        $this->subjects = [];
        $this->subject = '';
        
        if ($value) {
            $this->subjects = Subject::where('category_id', $value)->get();
        }
    }

    public function destroy($id)
    {
        $exam = ExamSet::find($id);
        if ($exam) {
            $exam->delete();
            $this->loadData();
            session()->flash('success', 'Exam deleted successfully!');
        }
    }

    private function resetForm()
    {
        $this->reset([
            'editingExamId', 'name', 'description', 'category_id',
            'subject', 'level_id', 'total_marks', 'duration',
            'type', 'status', 'subjects'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.pages.manage-exam');
    }
}
