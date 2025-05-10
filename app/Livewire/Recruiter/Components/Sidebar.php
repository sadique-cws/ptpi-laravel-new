<?php

namespace App\Livewire\Recruiter\Components;

use App\Models\ClassCategory;
use App\Models\Subject;
use Livewire\Component;

class Sidebar extends Component
{
    public $filters = [
        'pincode' => '',
        'category' => '',
        'subject' => '',
        'qualification' => '',
        'experience' => '',
        'gender' => '',
        'age_range' => '',
        'salary_range' => '',
    ];
    public $categories = [];
    public $subjects = [];
    public $qualifications = [];

    public function mount()
    {
        $this->categories = ClassCategory::all();
        $this->subjects = Subject::all();
        $this->qualifications = [
            'Bachelors', 'Masters', 'PhD', 'B.Ed', 'M.Ed'
        ];
    }

    public function updatedFilters()
    {
        $this->dispatch('filters-updated', $this->filters);
    }
    public function render()
    {
        return view('livewire.recruiter.components.sidebar');
    }
}
