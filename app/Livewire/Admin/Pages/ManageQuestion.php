<?php

namespace App\Livewire\Admin\Pages;

<<<<<<< HEAD
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

=======
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.adminLayout')]
class ManageQuestion extends Component
{
>>>>>>> 6a30d0d2d9167940be2e76067f79ff8849eb575f
    public function render()
    {
        return view('livewire.admin.pages.manage-question');
    }
}
