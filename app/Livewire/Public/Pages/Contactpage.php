<?php

namespace App\Livewire\Public\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("layouts.publicLayout")]
class Contactpage extends Component
{
    public function render()
    {
        return view('livewire.public.pages.contactpage');
    }
}
