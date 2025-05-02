<?php

namespace App\Livewire\Teacher\Pages;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TeacherAddress extends Component
{
    // Current Address Properties
    #[Validate('required|digits:6')]
    public $current_pincode = '';
    #[Validate('required|string')]
    public $current_state = '';
    #[Validate('required|string')]
    public $current_district = '';
    #[Validate('required|string')]
    public $current_post_office = '';
    public $current_postOffices = [];

    // Permanent Address Properties
    #[Validate('required|digits:6')]
    public $permanent_pincode = '';
    #[Validate('required|string')]
    public $permanent_state = '';
    #[Validate('required|string')]
    public $permanent_district = '';
    #[Validate('required|string')]
    public $permanent_post_office = '';
    public $permanent_postOffices = [];

    // UI State Properties
    public $errorMessage = '';
    public $isLoading = false;
    public $editingCurrentAddress = false;
    public $editingPermanentAddress = false;
    public $currentAddress = null;
    public $permanentAddress = null;

    public function mount()
    {
        if (!auth()->check()) {
            return redirect()->route('public.login');
        }
        $this->loadAddresses();
    }

    public function loadAddresses()
    {
        $this->currentAddress = Address::where('user_id', auth()->id())
            ->where('address_type', 'current')
            ->first();

        $this->permanentAddress = Address::where('user_id', auth()->id())
            ->where('address_type', 'permanent')
            ->first();

        if ($this->currentAddress) {
            $this->setCurrentAddressFields($this->currentAddress);
        }

        if ($this->permanentAddress) {
            $this->setPermanentAddressFields($this->permanentAddress);
        }
    }

    public function toggleEditCurrent()
    {
        $this->editingCurrentAddress = !$this->editingCurrentAddress;
    }

    public function toggleEditPermanent()
    {
        $this->editingPermanentAddress = !$this->editingPermanentAddress;
    }

    public function copyCurrentToPermanent()
    {
        $this->permanent_pincode = $this->current_pincode;
        $this->permanent_state = $this->current_state;
        $this->permanent_district = $this->current_district;
        $this->permanent_post_office = $this->current_post_office;
        $this->permanent_postOffices = $this->current_postOffices;
    }

    public function updatedCurrentPincode($value)
    {
        $this->resetCurrentAddressFields();
        if (strlen($value) === 6) {
            $this->fetchPincodeData($value, 'current');
        }
    }

    public function updatedPermanentPincode($value)
    {
        $this->resetPermanentAddressFields();
        if (strlen($value) === 6) {
            $this->fetchPincodeData($value, 'permanent');
        }
    }

    protected function fetchPincodeData($pincode, $type)
    {
        try {
            $response = Http::get("https://api.postalpincode.in/pincode/{$pincode}");

            if ($response->successful() && $response->json()[0]['Status'] === 'Success') {
                $data = $response->json()[0]['PostOffice'];
                
                if ($type === 'current') {
                    $this->current_postOffices = $data;
                    $this->current_state = $data[0]['State'] ?? '';
                    $this->current_district = $data[0]['District'] ?? '';
                } else {
                    $this->permanent_postOffices = $data;
                    $this->permanent_state = $data[0]['State'] ?? '';
                    $this->permanent_district = $data[0]['District'] ?? '';
                }
            } else {
                $this->errorMessage = 'Invalid PIN code or no data found.';
            }
        } catch (\Exception $e) {
            $this->errorMessage = 'Failed to fetch data. Please try again.';
        }
    }

    public function saveCurrentAddress()
    {
        $this->validate([
            'current_pincode' => 'required|digits:6',
            'current_state' => 'required|string',
            'current_district' => 'required|string',
            'current_post_office' => 'required|string',
        ]);

        Address::find(Auth::id())->update(
            [
                'user_id' => auth()->id(),
                'pincode' => $this->current_pincode,
                'state' => $this->current_state,
                'district' => $this->current_district,
                'address_type' => 'current', 
                'post_office' => $this->current_post_office,
            ]
        );

        session()->flash('message', 'Current address updated successfully.');
        $this->editingCurrentAddress = false;
        $this->loadAddresses();
    }

    public function savePermanentAddress()
    {
        $this->validate([
            'permanent_pincode' => 'required|digits:6',
            'permanent_state' => 'required|string',
            'permanent_district' => 'required|string',
            'permanent_post_office' => 'required|string',
        ]);

        Address::find(Auth::id())->update(
            [
                'user_id' => auth()->id(),
                'address_type' => 'permanent',
                'pincode' => $this->permanent_pincode,
                'state' => $this->permanent_state,
                'district' => $this->permanent_district,
                'post_office' => $this->permanent_post_office,
            ]
        );

        session()->flash('message', 'Permanent address updated successfully.');
        $this->editingPermanentAddress = false;
        $this->loadAddresses();
    }

    private function resetCurrentAddressFields()
    {
        $this->reset([
            'current_state',
            'current_district',
            'current_post_office',
            'current_postOffices',
            'errorMessage'
        ]);
    }

    private function resetPermanentAddressFields()
    {
        $this->reset([
            'permanent_state',
            'permanent_district',
            'permanent_post_office',
            'permanent_postOffices',
            'errorMessage'
        ]);
    }

    private function setCurrentAddressFields($address)
    {
        $this->current_pincode = $address->pincode;
        $this->current_state = $address->state;
        $this->current_district = $address->district;
        $this->current_post_office = $address->post_office;
    }

    private function setPermanentAddressFields($address)
    {
        $this->permanent_pincode = $address->pincode;
        $this->permanent_state = $address->state;
        $this->permanent_district = $address->district;
        $this->permanent_post_office = $address->post_office;
    }

    public function render()
    {
        return view('livewire.teacher.pages.teacher-address');
    }
}
