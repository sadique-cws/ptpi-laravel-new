<?php

namespace App\Livewire\Teacher\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use ImageKit\ImageKit;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('layouts.teacherLayout')]
class Profile extends Component
{
    use \Livewire\WithFileUploads;

    public $success;
    public $userId;

    #[Rule('nullable|image|mimes:jpeg,png,jpg,gif')]
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

    public $editingField = null;
    public $originalValues = [];
    

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
        $this->originalValues = $this->toArray();
    }

    public function editField($field)
    {
        $this->editingField = $field;
        $this->originalValues[$field] = $this->$field;
    }

    public function cancelEdit()
    {
        if ($this->editingField) {
            $this->{$this->editingField} = $this->originalValues[$this->editingField];
        }
        $this->editingField = null;
        $this->resetErrorBag();
    }

    public function uploadImageToImageKit(ImageKit $imageKit, $file)
    {
        $this->validateOnly('image');
        $user = Auth::user();

        try {
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Upload to ImageKit
            $response = $imageKit->uploadFile([
                'file' => fopen($file->getRealPath(), 'r'),
                'fileName' => $fileName,
                'folder' => '/teacher_profiles',
            ]);

            if (isset($response->result)) {
                $user->image = $response->result->url;
                $user->save();
                session()->flash('success', 'Profile image uploaded successfully!');
                return true;
            }
    
            $this->addError('image', 'Failed to upload image to ImageKit.');
            return false;
        } catch (\Exception $e) {
            $this->addError('image', 'Error uploading image: ' . $e->getMessage());
            return false;
        }
    }

    public function updatedImage(ImageKit $imageKit)
    {
        if ($this->image) {
            $this->uploadImageToImageKit($imageKit, $this->image);
            $this->reset(['image']);
        }
    }

    public function saveField($field)
    {
        $this->validateOnly($field);
        $user = Auth::user();

        switch ($field) {
            case 'language':
                $user->language = ucfirst($this->language); // Capitalize first letter
                break;
            case 'marital_status':
                $user->marital_status = ucfirst($this->marital_status);
                break;
            case 'religion':
                $user->religion = ucfirst($this->religion);
                break;
            default:
                $user->$field = $this->$field;
                break;
        }

        $user->save();
        $this->editingField = null;
        $this->originalValues[$field] = $this->$field;
        session()->flash('success', ucfirst($field) . ' updated successfully!');
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.teacher.pages.profile');
    }

    private function toArray()
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'language' => $this->language,
            'marital_status' => $this->marital_status,
            'religion' => $this->religion,
            'image' => $this->image,
        ];
    }
}
