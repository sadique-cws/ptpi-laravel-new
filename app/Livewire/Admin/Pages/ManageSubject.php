<?php

namespace App\Livewire\Admin\Pages;

use App\Models\ClassCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.adminLayout')]
class ManageSubject extends Component
{
    public function mount(){
        $category = ClassCategory::all();
        dd($category);
    }
    public function render()
    {
        return view('livewire.admin.pages.manage-subject');
    }
}
