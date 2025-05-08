<div class="container">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manage Subjects</h1>
        <button 
            wire:click="openModal"
            class="bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200"
        >
            Add New Subject
        </button>
    </div>

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($subjects as $subject)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $subject->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-600">{{ $subject->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $subject->category->cat_title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button 
                                wire:click="editSubject({{ $subject->id }})"
                                class="text-indigo-600 hover:text-indigo-900 mr-3"
                            >
                                Edit
                            </button>
                            <button 
                                wire:click="deleteSubject({{ $subject->id }})"
                                class="text-red-600 hover:text-red-900"
                                onclick="return confirm('Are you sure you want to delete this subject?')"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">No subjects found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {{-- <div class="px-6 py-4">
            {{ $subjects->links() }}
        </div> --}}
    </div>

    <!-- Modal -->
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" wire:click="closeModal">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                                    {{ $modalTitle }}
                                </h3>
                                
                                <form wire:submit.prevent="saveSubject">
                                    <div class="mb-4">
                                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                        <select
                                            wire:model="category_id"
                                            id="category_id"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        >
                                            <option value="">Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Subject Name</label>
                                        <input
                                            type="text"
                                            wire:model="title"
                                            id="title"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                            placeholder="Enter subject name"
                                        >
                                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button
                                            type="submit"
                                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
                                        >
                                            Save
                                        </button>
                                        <button
                                            type="button"
                                            wire:click="closeModal"
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        >
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
