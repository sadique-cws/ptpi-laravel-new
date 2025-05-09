<?php

namespace App\Livewire\Admin\Pages;

use Livewire\Attributes\Validate;
use Livewire\Component;

class ManageQuestion extends Component
{
    public $examSets = [];
    public $isModelOpen = false;
    public $editingQuestionId = [];
    #[Validate('required|string|max:255')]
    public $questionText = '';
    #[Validate('required|json')]
    public $options = [];


    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->examSets = ExamSet::with(['category', 'level'])->get();
       
    }

    public function render()
    {
        return view('livewire.admin.pages.manage-question');
    }
}
