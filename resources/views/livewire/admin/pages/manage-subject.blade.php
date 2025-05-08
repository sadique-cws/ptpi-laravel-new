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
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!-- Changed this div's classes to better center content -->
            <div class="flex items-center justify-center min-h-screen p-4">
                <!-- Background overlay -->
                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 backdrop-blur-sm" wire:click="closeModal"></div>

                <!-- Modal panel - removed sm:align-bottom and adjusted alignment classes -->
                <div class="relative w-full max-w-lg p-6 mx-auto text-left transition-all transform bg-white rounded-2xl shadow-xl">
                    <!-- Modal header -->
                    <div class="absolute top-0 right-0 pt-4 pr-4">
                        <button wire:click="closeModal" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                            <span class="sr-only">Close</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="mt-3">
                        <h3 class="text-xl font-semibold leading-6 text-gray-900 mb-6" id="modal-title">
                            {{ $modalTitle }}
                        </h3>
                        
                        <form wire:submit.prevent="saveSubject" class="space-y-6">
                            <!-- Category Select -->
                            <div class="relative">
                                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Category
                                </label>
                                <select
                                    wire:model="category_id"
                                    id="category_id"
                                    class="w-full p-2 border rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-200"
                                >
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') 
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Subject Name Input -->
                            <div class="relative">
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                    Subject Name
                                </label>
                                <input
                                    type="text"
                                    wire:model="title"
                                    id="title"
                                    class="w-full p-2 border rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition duration-200"
                                    placeholder="Enter subject name"
                                >
                                @error('title') 
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 space-y-3 space-y-reverse sm:space-y-0 mt-6">
                                <button
                                    type="button"
                                    wire:click="closeModal"
                                    class="inline-flex justify-center px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200"
                                >
                                    Cancel
                                </button>
                                <button
                                    type="submit"
                                    class="inline-flex justify-center px-4 py-2.5 text-sm font-medium text-white bg-teal-600 border border-transparent rounded-lg shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200"
                                >
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
