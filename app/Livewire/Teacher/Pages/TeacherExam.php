<?php

namespace App\Livewire\Teacher\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.teacherLayout')]
class TeacherExam extends Component
{
    public function render()
    {
        return view('livewire.teacher.pages.teacher-exam');
    }
}
