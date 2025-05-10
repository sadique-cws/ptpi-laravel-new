<?php

namespace App\Livewire\Admin\Pages;

use App\Models\ClassCategory;
use App\Models\ExamSet;
use App\Models\Subject;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.adminLayout')]
class Dashboard extends Component
{
    public function render()
    {
        $stats = [
            'students' => User::where('role', 'student')->count(),
            'teachers' => User::where('role', 'teacher')->count(),
            'categories' => ClassCategory::count(),
            'subjects' => Subject::count(),
            'exams' => ExamSet::count(),
            'activeExams' => ExamSet::where('status', 'published')->count(),
        ];

        $recentTeachers = User::where('role', 'teacher')
            ->latest()
            ->take(5)
            ->get();

        $recentExams = ExamSet::with(['category'])
            ->latest()
            ->take(5)
            ->get();

        return view('livewire.admin.pages.dashboard', [
            'stats' => $stats,
            'recentTeachers' => $recentTeachers,
            'recentExams' => $recentExams,
        ]);
    }
}
