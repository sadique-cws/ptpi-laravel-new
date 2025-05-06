<div class="space-y-8">
    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="mb-4 flex items-center p-4 bg-green-50 border-l-4 border-green-500 rounded-r-xl">
            <svg class="h-6 w-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span class="text-green-700">{{ session('message') }}</span>
        </div>
    @endif

    <!-- Current Address Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Current Address</h2>
                @if(!$editingCurrentAddress)
                    <button wire:click="toggleEditCurrent" class="text-teal-600 hover:text-teal-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                @endif
            </div>

            @if(!$editingCurrentAddress && $currentAddress)
                <!-- Display Current Address -->
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <span class="text-sm text-gray-500">PIN Code</span>
                            <p class="text-gray-700">{{ $currentAddress->pincode }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">State</span>
                            <p class="text-gray-700">{{ $currentAddress->state }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">District</span>
                            <p class="text-gray-700">{{ $currentAddress->district }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Post Office</span>
                            <p class="text-gray-700">{{ $currentAddress->post_office }}</p>
                        </div>
                    </div>
                </div>
            @elseif($editingCurrentAddress)
                <!-- Current Address Form -->
                <form wire:submit.prevent="saveCurrentAddress" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- PIN Code -->
                        <div>
                            <label for="current_pincode" class="block text-sm font-medium text-gray-700">PIN Code</label>
                            <input type="text" 
                                id="current_pincode" 
                                wire:model.live="current_pincode"
                                maxlength="6"
                                class="mt-1 p-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500"
                                placeholder="Enter 6 digit PIN code">
                            @error('current_pincode') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- State -->
                        <div>
                            <label for="current_state" class="block text-sm font-medium text-gray-700">State</label>
                            <input type="text" 
                                id="current_state" 
                                wire:model="current_state"
                                readonly
                                class="mt-1 p-2 block w-full rounded-lg border-gray-300 bg-gray-50">
                            @error('current_state') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- District -->
                        <div>
                            <label for="current_district" class="block text-sm font-medium text-gray-700">District</label>
                            <input type="text" 
                                id="current_district" 
                                wire:model="current_district"
                                readonly
                                class="mt-1 p-2 block w-full rounded-lg border-gray-300 bg-gray-50">
                            @error('current_district') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Post Office -->
                        <div>
                            <label for="current_post_office" class="block text-sm font-medium text-gray-700">Post Office</label>
                            <select id="current_post_office" 
                                wire:model="current_post_office"
                                class="mt-1 p-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500">
                                <option value="">Select Post Office</option>
                                @foreach($current_postOffices as $office)
                                    <option value="{{ $office['Name'] }}">{{ $office['Name'] }}</option>
                                @endforeach
                            </select>
                            @error('current_post_office') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3">
                        <button type="button" 
                            wire:click="toggleEditCurrent"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-teal-600 border border-transparent rounded-md shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                            Save Address
                        </button>
                    </div>
                </form>
            @else
                <p class="text-gray-500 italic">No current address found. Click edit to add one.</p>
            @endif
        </div>
    </div>

    <!-- Permanent Address Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Permanent Address</h2>
                <div class="flex space-x-4">
                    @if(!$editingPermanentAddress)
                        <button wire:click="copyCurrentToPermanent" 
                            class="text-blue-600 hover:text-blue-700 text-sm">
                            Same as Current
                        </button>
                        <button wire:click="toggleEditPermanent" class="text-teal-600 hover:text-teal-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </button>
                    @endif
                </div>
            </div>

            @if(!$editingPermanentAddress && $permanentAddress)
                <!-- Display Permanent Address -->
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <span class="text-sm text-gray-500">PIN Code</span>
                            <p class="text-gray-700">{{ $permanentAddress->pincode }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">State</span>
                            <p class="text-gray-700">{{ $permanentAddress->state }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">District</span>
                            <p class="text-gray-700">{{ $permanentAddress->district }}</p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">Post Office</span>
                            <p class="text-gray-700">{{ $permanentAddress->post_office }}</p>
                        </div>
                    </div>
                </div>
            @elseif($editingPermanentAddress)
                <!-- Permanent Address Form -->
                <form wire:submit.prevent="savePermanentAddress" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- PIN Code -->
                        <div>
                            <label for="permanent_pincode" class="block text-sm font-medium text-gray-700">PIN Code</label>
                            <input type="text" 
                                id="permanent_pincode" 
                                wire:model.live="permanent_pincode"
                                maxlength="6"
                                class="mt-1 p-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500"
                                placeholder="Enter 6 digit PIN code">
                            @error('permanent_pincode') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- State -->
                        <div>
                            <label for="permanent_state" class="block text-sm font-medium text-gray-700">State</label>
                            <input type="text" 
                                id="permanent_state" 
                                wire:model="permanent_state"
                                readonly
                                class="mt-1 p-2 block w-full rounded-lg border-gray-300 bg-gray-50">
                            @error('permanent_state') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- District -->
                        <div>
                            <label for="permanent_district" class="block text-sm font-medium text-gray-700">District</label>
                            <input type="text" 
                                id="permanent_district" 
                                wire:model="permanent_district"
                                readonly
                                class="mt-1 p-2 block w-full rounded-lg border-gray-300 bg-gray-50">
                            @error('permanent_district') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Post Office -->
                        <div>
                            <label for="permanent_post_office" class="block text-sm font-medium text-gray-700">Post Office</label>
                            <select id="permanent_post_office" 
                                wire:model="permanent_post_office"
                                class="mt-1 p-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500">
                                <option value="">Select Post Office</option>
                                @foreach($permanent_postOffices as $office)
                                    <option value="{{ $office['Name'] }}">{{ $office['Name'] }}</option>
                                @endforeach
                            </select>
                            @error('permanent_post_office') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3">
                        <button type="button" 
                            wire:click="toggleEditPermanent"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-teal-600 border border-transparent rounded-md shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                            Save Address
                        </button>
                    </div>
                </form>
            @else
                <p class="text-gray-500 italic">No permanent address found. Click edit to add one.</p>
            @endif
        </div>
    </div>
</div>