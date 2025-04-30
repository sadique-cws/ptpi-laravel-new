<?php

namespace App\Livewire\Teacher\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.teacherLayout')]
class Profile extends Component
{
    public $userId;

    #[Rule('nullable|image|mimes:jpeg,png,jpg,gif|max:2048')]
    public $image;
    
    #[Rule('nullable|digits:10')]
    public $phone;

    #[Rule('nullable|in:Hindi,English,Other')]
    public $language;

    #[Rule('nullable|in:male,female,other')]
    public $gender;

    #[Rule('nullable|in:Single,Married,Unmarried')]
    public $marital_status;

    #[Rule('nullable|in:Hindu,Muslim,Other')]
    public $religion;

    #[Rule('nullable|string|max:255')]
    public $first_name;

    #[Rule('nullable|string|max:255')]
    public $last_name;
    

    public function mount(){
        $this->userId = Auth::id();
        $user = User::find($this->userId);
        $this->phone = $user->phone;
        $this->language = $user->language;
        $this->gender = $user->gender;
        $this->marital_status = $user->marital_status;
        $this->religion = $user->religion;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
    }
    public function render()
    {
        return view('livewire.teacher.pages.profile');
    }
}
