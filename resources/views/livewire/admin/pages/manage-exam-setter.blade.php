<div class="w-full">
    <div class="px-4">
        <!-- Header -->
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Manage Exam Setters</h2>
                <p class="mt-1 text-sm text-gray-500">Assign and manage exam setters for different categories and subjects</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <button 
                    wire:click="toggleModal"
                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500"
                >
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Assign New Exam Setter
                </button>
            </div>
        </div>

        <!-- Success Message -->
        @if (session()->has('message'))
            <div class="mt-4 p-4 rounded-lg bg-green-50 text-green-700">
                {{ session('message') }}
            </div>
        @endif

        <!-- Table -->
        <div class="mt-8 flex flex-col">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle">
                    <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Category</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Subject</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($examSetters as $assignment)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ $assignment->user->first_name }} {{ $assignment->user->last_name }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $assignment->user->email }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $assignment->category->cat_title }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $assignment->subject->title }}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $examSetters->links() }}
        </div>
    </div>

    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex min-h-screen items-end justify-center px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="toggleModal"></div>

                <div class="inline-block transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left align-bottom shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6 sm:align-middle">
                    <div class="absolute right-0 top-0 pr-4 pt-4">
                        <button wire:click="toggleModal" class="rounded-md bg-white text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form wire:submit.prevent="createExamSetter">
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">Assign New Exam Setter</h3>
                                <p class="mt-1 text-sm text-gray-500">Fill in the details to create a new exam setter account.</p>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                    <input type="text" wire:model="first_name" id="first_name" class="mt-1 p-2 border block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                                    @error('first_name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                    <input type="text" wire:model="last_name" id="last_name" class="mt-1 p-2 border block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                                    @error('last_name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" wire:model="email" id="email" class="mt-1 p-2 border block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                                @error('email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" wire:model="password" id="password" class="mt-1 p-2 border block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                                @error('password') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Class Category</label>
                                <select wire:model.change="selectedCategory" id="category" class="mt-1 p-2 border block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                                    @endforeach
                                </select>
                                @error('selectedCategory') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                                <select 
                                    wire:model.live="selectedSubject" 
                                    id="subject" 
                                    class="mt-1 p-2 border block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500"
                                    @if(!$selectedCategory) disabled @endif
                                >
                                    <option value="">Select Subject</option>
                                    @foreach($availableSubjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                    @endforeach
                                </select>
                                @if(!$selectedCategory)
                                    <p class="mt-1 text-sm text-gray-500">Please select a category first</p>
                                @endif
                                @error('selectedSubject') 
                                    <span class="text-sm text-red-600">{{ $message }}</span> 
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <button 
                                type="button" 
                                wire:click="toggleModal"
                                class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            >
                                Cancel
                            </button>
                            <button 
                                type="submit"
                                class="rounded-lg border border-transparent bg-teal-600 px-4 py-2 text-sm font-medium text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                            >
                                Create Exam Setter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
