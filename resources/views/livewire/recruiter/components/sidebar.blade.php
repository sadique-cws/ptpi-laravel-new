<div class="fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-gray-200 pb-4 overflow-y-auto">
    <div class="p-6 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-900">Filter Teachers</h2>
        <p class="mt-1 text-sm text-gray-500">Refine your search results</p>
    </div>

    <div class="p-6 space-y-6">
        <!-- Location Filter -->
        <div>
            <label class="text-sm font-medium text-gray-900">Location</label>
            <input 
                type="text" 
                wire:model.live.debounce.300ms="filters.pincode"
                placeholder="Enter pincode"
                class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm"
            >
        </div>

        <!-- Category Filter -->
        <div>
            <label class="text-sm font-medium text-gray-900">Class Category</label>
            <select 
                wire:model.live="filters.category"
                class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm"
            >
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Subject Filter -->
        <div>
            <label class="text-sm font-medium text-gray-900">Subject</label>
            <select 
                wire:model.live="filters.subject"
                class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm"
            >
                <option value="">All Subjects</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Qualification Filter -->
        <div>
            <label class="text-sm font-medium text-gray-900">Qualification</label>
            <select 
                wire:model.live="filters.qualification"
                class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm"
            >
                <option value="">Any Qualification</option>
                @foreach($qualifications as $qualification)
                    <option value="{{ $qualification }}">{{ $qualification }}</option>
                @endforeach
            </select>
        </div>

        <!-- Experience Range -->
        <div>
            <label class="text-sm font-medium text-gray-900">Experience (Years)</label>
            <select 
                wire:model.live="filters.experience"
                class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm"
            >
                <option value="">Any Experience</option>
                <option value="0-2">0-2 years</option>
                <option value="2-5">2-5 years</option>
                <option value="5-10">5-10 years</option>
                <option value="10+">10+ years</option>
            </select>
        </div>

        <!-- Gender Filter -->
        <div>
            <label class="text-sm font-medium text-gray-900">Gender</label>
            <div class="mt-2 space-y-2">
                <label class="inline-flex items-center">
                    <input type="radio" wire:model.live="filters.gender" value="" class="text-teal-600">
                    <span class="ml-2 text-sm text-gray-700">All</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" wire:model.live="filters.gender" value="male" class="text-teal-600">
                    <span class="ml-2 text-sm text-gray-700">Male</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" wire:model.live="filters.gender" value="female" class="text-teal-600">
                    <span class="ml-2 text-sm text-gray-700">Female</span>
                </label>
            </div>
        </div>

        <!-- Age Range -->
        <div>
            <label class="text-sm font-medium text-gray-900">Age Range</label>
            <select 
                wire:model.live="filters.age_range"
                class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm"
            >
                <option value="">Any Age</option>
                <option value="20-30">20-30 years</option>
                <option value="31-40">31-40 years</option>
                <option value="41-50">41-50 years</option>
                <option value="50+">Above 50</option>
            </select>
        </div>

        <!-- Salary Range -->
        <div>
            <label class="text-sm font-medium text-gray-900">Expected Salary</label>
            <select 
                wire:model.live="filters.salary_range"
                class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm"
            >
                <option value="">Any Range</option>
                <option value="0-20000">Up to ₹20,000</option>
                <option value="20000-40000">₹20,000 - ₹40,000</option>
                <option value="40000-60000">₹40,000 - ₹60,000</option>
                <option value="60000+">Above ₹60,000</option>
            </select>
        </div>
    </div>
</div>