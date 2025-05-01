<div class="p-4 sm:p-6 lg:p-2">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Profile Header -->
        <div class="relative">
            <div class="h-48 bg-gradient-to-r from-[#3E98C7] to-[#2A6F97] rounded-t-lg"></div>
            <div class="absolute bottom-0 left-8 transform translate-y-1/2">
                <div class="relative group">
                    @if($image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Profile Picture" 
                            class="w-32 h-32 rounded-full border-4 border-white object-cover shadow-lg transition duration-300">
                    @else
                        <div class="w-32 h-32 rounded-full border-4 border-white bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center shadow-lg">
                            <span class="text-4xl text-gray-400 font-medium">{{ substr($first_name ?? '', 0, 1) }}</span>
                        </div>
                    @endif
                    <label for="image-upload" 
                        class="absolute bottom-0 right-0 bg-white p-2.5 rounded-full cursor-pointer hover:bg-gray-50 transition-all duration-200 shadow-lg border group-hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <input type="file" wire:model="image" id="image-upload" class="hidden" accept="image/*">
                    </label>
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="pt-24 px-8 pb-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12 gap-y-8">
                <!-- Personal Information -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-3 mb-6">
                        <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <h2 class="text-2xl font-semibold text-gray-800">Personal Information</h2>
                    </div>

                    <!-- Email Field (Non-editable) -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Email Address</label>
                        <div class="flex items-center space-x-2 p-3 rounded-lg bg-gray-50">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-600">{{ auth()->user()->email }}</span>
                            <span class="ml-2 px-2 py-1 text-xs font-medium text-teal-700 bg-teal-100 rounded-full">Verified</span>
                        </div>
                    </div>

                    <!-- Existing Input Fields -->
                    @foreach(['first_name' => 'First Name', 'last_name' => 'Last Name', 'phone' => 'Phone Number'] as $field => $label)
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700">{{ $label }}</label>
                            @if($editingField === $field)
                                <div class="relative group">
                                    <input type="text" wire:model="{{ $field }}" 
                                        class="w-full px-4 py-2.5 rounded-lg border-gray-200 focus:border-teal-500 focus:ring focus:ring-teal-200 focus:ring-opacity-50 transition-all duration-200" 
                                        placeholder="Enter {{ $label }}">
                                    <div class="absolute right-0 top-0 h-full flex items-center space-x-2 pr-2">
                                        <button wire:click="saveField('{{ $field }}')" 
                                            class="p-1.5 rounded-md text-teal-600 hover:bg-teal-50 transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </button>
                                        <button wire:click="cancelEdit" 
                                            class="p-1.5 rounded-md text-gray-400 hover:bg-gray-50 transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50 group hover:bg-gray-100 transition-all duration-200">
                                    <span class="text-gray-700">{{ $$field ?: 'Not Provided' }}</span>
                                    <button wire:click="editField('{{ $field }}')" 
                                        class="p-1.5 rounded-md text-gray-400 opacity-0 group-hover:opacity-100 hover:text-teal-600 hover:bg-white transition-all duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </button>
                                </div>
                            @endif
                            @error($field) <span class="text-sm text-red-500 mt-1">{{ $message }}</span> @enderror
                        </div>
                    @endforeach
                </div>

                <!-- Additional Information -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-3 mb-6">
                        <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <h2 class="text-2xl font-semibold text-gray-800">Additional Information</h2>
                    </div>

                    <!-- Dropdown Fields -->
                    @foreach(['gender' => ['Male', 'Female', 'Other'], 
                             'language' => ['Hindi', 'English', 'Other'],
                             'marital_status' => ['Single', 'Married', 'Unmarried'],
                             'religion' => ['Hindu', 'Muslim', 'Other']] as $field => $options)
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                            @if($editingField === $field)
                                <div class="relative group">
                                    <select wire:model="{{ $field }}" 
                                        class="w-full px-4 py-2.5 rounded-lg border-gray-200 focus:border-teal-500 focus:ring focus:ring-teal-200 focus:ring-opacity-50 transition-all duration-200">
                                        <option value="">Select {{ ucwords(str_replace('_', ' ', $field)) }}</option>
                                        @foreach($options as $option)
                                            <option value="{{ strtolower($option) }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute right-0 top-0 h-full flex items-center space-x-2 pr-2">
                                        <button wire:click="saveField('{{ $field }}')" 
                                            class="p-1.5 rounded-md text-teal-600 hover:bg-teal-50 transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </button>
                                        <button wire:click="cancelEdit" 
                                            class="p-1.5 rounded-md text-gray-400 hover:bg-gray-50 transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50 group hover:bg-gray-100 transition-all duration-200">
                                    <span class="text-gray-700">{{ $$field ? ucfirst($$field) : 'Not Provided' }}</span>
                                    <button wire:click="editField('{{ $field }}')" 
                                        class="p-1.5 rounded-md text-gray-400 opacity-0 group-hover:opacity-100 hover:text-teal-600 hover:bg-white transition-all duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </button>
                                </div>
                            @endif
                            @error($field) <span class="text-sm text-red-500 mt-1">{{ $message }}</span> @enderror
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>