<?php

namespace App\Livewire\Questionsetter\Pages;

use App\Models\ExamSet;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.examSetterLayout')]
class Dashboard extends Component
{
    use WithPagination;

    public $showCreateModal = false;
    public $examName;
    public $description;
    public $duration;
    public $totalMarks;
    public $type = 'online';
    public $status = 'draft';

    protected function rules()
    {
        return [
            'examName' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'totalMarks' => 'required|integer|min:1',
            'type' => 'required|in:online,offline',
            'status' => 'required|in:draft,published,archived',
        ];
    }

    public function toggleModal()
    {
        $this->showCreateModal = !$this->showCreateModal;
        $this->reset(['examName', 'description', 'duration', 'totalMarks']);
    }

    public function createExamSet()
    {
        $this->validate();

        $examSetter = auth()->user()->examSetter;
        
        if (!$examSetter) {
            session()->flash('error', 'You are not assigned to any category or subject.');
            return;
        }

        $examSet = ExamSet::create([
            'user_id' => auth()->id(),
            'name' => $this->examName,
            'description' => $this->description,
            'category_id' => $examSetter->category_id,
            'subject_id' => $examSetter->subject_id, // Changed from subject to subject_id
            'duration' => $this->duration,
            'total_marks' => $this->totalMarks,
            'type' => $this->type,
            'status' => $this->status,
        ]);

        $this->toggleModal();
        session()->flash('message', 'Exam set created successfully.');
        return redirect()->route('questionsetter.exam.questions', $examSet->id);
    }

    public function render()
    {
        $examSetter = auth()->user()->examSetter;

        return view('livewire.questionsetter.pages.dashboard', [
            'examSets' => ExamSet::where('user_id', auth()->id())
                ->latest()
                ->paginate(10),
            'examSetter' => $examSetter
        ]);
    }
}
