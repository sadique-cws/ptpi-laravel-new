<?php

namespace App\Livewire\Recruiter\Pages;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.recruiterLayout')]
class Dashboard extends Component
{
    use WithPagination;

    protected $listeners = [
        'filters-updated' => 'applyFilters',
        'search-updated' => 'applySearch'
    ];

    public $filters = [];
    public $search = '';

    public function applyFilters($filters)
    {
        $this->filters = $filters;
        $this->resetPage();
    }

    public function applySearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function render()
    {
        $teachers = User::where('role', 'teacher')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('first_name', 'like', '%' . $this->search . '%')
                        ->orWhere('last_name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('pincode', 'like', '%' . $this->search . '%');
                });
            })
            ->when(isset($this->filters['pincode']), function ($query) {
                $query->where('pincode', $this->filters['pincode']);
            })
            ->when(isset($this->filters['category']), function ($query) {
                $query->whereHas('categories', function ($q) {
                    $q->where('category_id', $this->filters['category']);
                });
            })
            ->when(isset($this->filters['qualification']), function ($query) {
                $query->where('qualification', $this->filters['qualification']);
            })
            ->when(isset($this->filters['experience']), function ($query) {
                // Parse experience range and apply filter
                $range = explode('-', $this->filters['experience']);
                if (count($range) == 2) {
                    $query->whereBetween('experience', [$range[0], $range[1]]);
                }
            })
            ->when(isset($this->filters['gender']), function ($query) {
                $query->where('gender', $this->filters['gender']);
            })
            ->paginate(12);

        return view('livewire.recruiter.pages.dashboard', [
            'teachers' => $teachers
        ]);
    }
}
