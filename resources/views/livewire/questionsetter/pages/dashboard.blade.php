<div class="min-h-screen bg-gray-50 w-full">
    <!-- Top Header Section -->
    <div class="bg-white shadow w-full">
        <div class="px-6 py-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                        Exam Sets
                    </h2>
                    @if($examSetter)
                        <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                {{ $examSetter->category->cat_title ?? 'Unassigned Category' }}
                            </div>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                {{ $examSetter->subject->title ?? 'Unassigned Subject' }}
                            </div>
                        </div>
                    @else
                        <div class="mt-2 flex items-center text-sm text-red-500">
                            <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            Not assigned to any category or subject. Please contact your administrator.
                        </div>
                    @endif
                </div>

                @if($examSetter)
                    <div class="mt-5 flex lg:ml-4 lg:mt-0">
                        <button 
                            wire:click="toggleModal"
                            class="inline-flex items-center rounded-lg bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600"
                        >
                            <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            New Exam Set
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="px-6 py-8 w-full">
        <!-- Messages -->
        @if (session()->has('error'))
            <div class="mb-6 rounded-lg bg-red-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session()->has('message'))
            <div class="mb-6 rounded-lg bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Exam Sets Grid -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
            @forelse($examSets as $examSet)
                <div class="group relative rounded-xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition-all duration-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-teal-600 transition-colors">
                            {{ $examSet->name }}
                        </h3>
                        <span @class([
                            'inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium',
                            'bg-green-100 text-green-800' => $examSet->status === 'published',
                            'bg-yellow-100 text-yellow-800' => $examSet->status === 'draft',
                            'bg-gray-100 text-gray-800' => !in_array($examSet->status, ['published', 'draft'])
                        ])>
                            {{ ucfirst($examSet->status) }}
                        </span>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-4 border-t border-b border-gray-100 py-4">
                        <div class="text-center">
                            <span class="text-2xl font-bold text-gray-900">{{ $examSet->duration }}</span>
                            <span class="block text-xs text-gray-500 uppercase tracking-wide">Minutes</span>
                        </div>
                        <div class="text-center">
                            <span class="text-2xl font-bold text-gray-900">{{ $examSet->total_marks }}</span>
                            <span class="block text-xs text-gray-500 uppercase tracking-wide">Marks</span>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <a 
                            href="{{ route('questionsetter.exam.questions', $examSet->id) }}"
                            class="inline-flex items-center rounded-lg bg-teal-50 px-4 py-2 text-sm font-semibold text-teal-600 hover:bg-teal-100"
                        >
                            <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            Manage Questions
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        </svg>
                        <span class="mt-2 block text-sm font-semibold text-gray-900">No exam sets yet</span>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new exam set.</p>
                        @if($examSetter)
                            <button
                                wire:click="toggleModal" 
                                class="mt-6 inline-flex items-center rounded-lg bg-teal-600 px-4 py-2 text-sm font-semibold text-white hover:bg-teal-500"
                            >
                                <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Create New Exam Set
                            </button>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $examSets->links() }}
        </div>
    </div>

    <!-- Create Exam Set Modal -->
    @if($showCreateModal)
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

                <form wire:submit.prevent="createExamSet">
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Create New Exam Set</h3>
                            <p class="mt-1 text-sm text-gray-500">Fill in the details to create a new exam set.</p>
                        </div>

                        <div>
                            <label for="examName" class="block text-sm font-medium text-gray-700">Exam Name</label>
                            <input type="text" wire:model="examName" id="examName" class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                            @error('examName') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea wire:model="description" id="description" rows="3" class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm"></textarea>
                            @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="duration" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
                                <input type="number" wire:model="duration" id="duration" class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                @error('duration') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="totalMarks" class="block text-sm font-medium text-gray-700">Total Marks</label>
                                <input type="number" wire:model="totalMarks" id="totalMarks" class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                @error('totalMarks') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700">Exam Type</label>
                                <select wire:model="type" id="type" class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                </select>
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select wire:model="status" id="status" class="mt-1 p-2 border block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button 
                            type="button" 
                            wire:click="toggleModal"
                            class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        >
                            Cancel
                        </button>
                        <button 
                            type="submit"
                            class="rounded-md border border-transparent bg-teal-600 px-4 py-2 text-sm font-medium text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2"
                        >
                            Create Exam Set
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
