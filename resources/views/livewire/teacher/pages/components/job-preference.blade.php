<div>
    <div class="px-4 sm:px-6 mt-2 py-6 rounded-xl bg-white border border-gray-200">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 pb-4 border-b border-gray-200">
            <div class="mb-3 sm:mb-0">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Professional Experience</h2>
                <p class="text-sm text-gray-500">Manage your teaching positions and institutional experience</p>
            </div>
            <button 
                wire:click="openModal"
                class="flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-[#3E98C7] to-[#67B3DA] transition-colors rounded-lg shadow-sm hover:shadow-md"
            >
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="size-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M363 277h-86v86h-42v-86h-86v-42h86v-86h42v86h86v42z"></path>
                    <path d="M256 90c44.3 0 86 17.3 117.4 48.6C404.7 170 422 211.7 422 256s-17.3 86-48.6 117.4C342 404.7 300.3 422 256 422c-44.3 0-86-17.3-117.4-48.6C107.3 342 90 300.3 90 256c0-44.3 17.3-86 48.6-117.4C170 107.3 211.7 90 256 90m0-42C141.1 48 48 141.1 48 256s93.1 208 208 208 208-93.1 208-208S370.9 48 256 48z"></path>
                </svg>
                Add Preference
            </button>
        </div>

        @if($preferences->isEmpty())
            <div class="p-6 text-center rounded-xl bg-gray-50 border-2 border-dashed border-gray-200">
                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" class="mx-auto size-12 text-gray-400 mb-3" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <h3 class="text-gray-500 font-medium">No preference added yet</h3>
                <p class="text-sm text-gray-400 mt-1">Click 'Add Preference' to get started</p>
            </div>
        @else
            <div class="space-y-4">
                <!-- Display existing preferences here -->
                @foreach($preferences as $preference)
                    <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <h4 class="font-medium text-gray-900">{{ $preference->category->cat_title }}</h4>
                                <p class="text-sm text-gray-500">{{ $preference->subject->title }} - {{ $preference->jobRole->role_name }}</p>
                            </div>
                            <!-- Add delete/edit buttons if needed -->
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if($showModal)
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
                <div class="bg-white rounded-lg w-full max-w-md">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-lg font-semibold">Add Teaching Preference</h3>
                            <button 
                                type="button" 
                                wire:click="$set('showModal', false)"
                                class="text-gray-400 hover:text-gray-500 transition-colors"
                            >
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <form wire:submit.prevent="savePreference">
                            <div class="space-y-4">
                                <!-- Class Category -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Class Category</label>
                                    <select 
                                        wire:model.change="category_id"
                                        class="w-full p-2 border rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500"
                                    >
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Subject -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                                    <select 
                                        wire:model="subject_id"
                                        class="w-full p-2 border rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500"
                                        @empty($subjects) disabled @endempty
                                    >
                                        <option value="">Select Subject</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Job Role -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Job Role</label>
                                    <select 
                                        wire:model="job_role_id"
                                        class="w-full p-2 border rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    >
                                        <option value="">Select Job Role</option>
                                        @foreach($jobRoles as $role)
                                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('job_role_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end space-x-3">
                                <button 
                                    type="button"
                                    wire:click="$set('showModal', false)"
                                    class="px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-md border border-gray-300"
                                >
                                    Cancel
                                </button>
                                <button 
                                    type="submit"
                                    class="px-4 py-2 bg-gradient-to-r from-[#3E98C7] to-[#67B3DA] text-white rounded-md"
                                >
                                    Save Preference
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>