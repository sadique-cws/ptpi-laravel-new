<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Level;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
#[Layout('layouts.adminLayout')]
class ManageLevel extends Component
{
    use WithPagination;
    public $levels = [];
    #[Validate( 'required|string|max:255')]
    public $level_name = '';
    #[Validate('required|max:255')]
    public $level_code = '';
    public $isModalOpen = false;
    public $editingLevelId = null;
    
    public function storeOrUpdate()
    {
        $data = $this->validate();

        if ($this->editingLevelId) {
            $levels = Level::find($this->editingLevelId);
            if ($levels) {
                $levels->update($data);
            }
        } else {
            Level::create($data);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $levels = Level::find($id);

        if ($levels) {
            $this->editingLevelId = $levels->id;
            $this->level_name = $levels->level_name;
            $this->level_code = $levels->level_code;
            $this->isModalOpen = true;
        }
    }

    public function destroy($id){
        $level = Level::find($id);
        if($level){
            $level->delete();
        }
    }

    public function openModal(){
        $this->resetForm();
        $this->isModalOpen = true;
    }

    public function closeModal(){
        $this->resetForm();
        $this->isModalOpen = false;
    }

    private function resetForm(){
        $this->reset(['level_name', 'level_code']);
    }

    public function render()
    {
        $this->levels = Level::get();
        return view('livewire.admin.pages.manage-level');
    }
}
