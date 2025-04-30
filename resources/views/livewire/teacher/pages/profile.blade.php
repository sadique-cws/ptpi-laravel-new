<div class="w-full p-2">
    <div class=" bg-white rounded-lg shadow-md">
        <!-- Profile Header -->
        <div class="relative">
            <div class="h-48 bg-gradient-to-r from-[#3E98C7] to-[#2A6F97] rounded-t-lg"></div>
            <div class="absolute bottom-0 left-8 transform translate-y-1/2">
                <div class="relative">
                    @if($image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Profile Picture" class="w-32 h-32 rounded-full border-4 border-white">
                    @else
                        <div class="w-32 h-32 rounded-full border-4 border-white bg-gray-200 flex items-center justify-center">
                            <span class="text-4xl text-gray-400">{{ substr($first_name ?? '', 0, 1) }}</span>
                        </div>
                    @endif
                    <label for="image-upload" class="absolute bottom-0 right-0 bg-teal-500 p-2 rounded-full cursor-pointer hover:bg-teal-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        <input type="file" wire:model="image" id="image-upload" class="hidden">
                    </label>
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="pt-20 px-8 pb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Personal Information -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Personal Information</h2>
                    
                    <!-- Name -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">First Name</label>
                        <input type="text" wire:model="first_name" class="w-full p-2 border rounded-md" placeholder="Enter first name">
                        @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Last Name</label>
                        <input type="text" wire:model="last_name" class="w-full p-2 border rounded-md" placeholder="Enter last name">
                        @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                        <input type="email" disabled value="{{ auth()->user()->email }}" class="w-full p-2 border rounded-md bg-gray-50">
                    </div>

                    <!-- Phone -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Phone Number</label>
                        <input type="text" wire:model="phone" class="w-full p-2 border rounded-md" placeholder="Enter phone number">
                        @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Additional Information -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Additional Information</h2>
                    
                    <!-- Gender -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Gender</label>
                        <select wire:model="gender" class="w-full p-2 border rounded-md">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Language -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Preferred Language</label>
                        <select wire:model="language" class="w-full p-2 border rounded-md">
                            <option value="">Select Language</option>
                            <option value="Hindi">Hindi</option>
                            <option value="English">English</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('language') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Marital Status -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Marital Status</label>
                        <select wire:model="marital_status" class="w-full p-2 border rounded-md">
                            <option value="">Select Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Unmarried">Unmarried</option>
                        </select>
                        @error('marital_status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Religion -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Religion</label>
                        <select wire:model="religion" class="w-full p-2 border rounded-md">
                            <option value="">Select Religion</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('religion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="mt-6 flex justify-end">
                <button wire:click="save" class="bg-teal-600 text-white px-6 py-2 rounded-md hover:bg-teal-700 transition duration-200">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</div>