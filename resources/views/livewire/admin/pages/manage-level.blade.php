<div>
    <div class="">
        <div class="">
            <div class="flex gap-3 flex-col md:flex-row justify-between md:items-center mb-6">
                <div class="flex flex-wrap justify-between items-center">
                    <h2 class="md:text-xl text-lg font-semibold text-slate-500 border-s-4 border-s-purple-800 pl-3 ">
                        Manage Level
                    </h2>
                </div>
                <div class="flex gap-3 items-center">
                    <input type="text" wire:model.live.debounce.500ms="search" placeholder="Search levels..."
                        class="border rounded px-3 py-2 w-full md:w-64">
                    <button type="button" wire:click="openModal"
                        class="bg-teal-700 hover:bg-teal-600 text-white font-bold px-4 py-2 rounded">
                        Add Level
                    </button>
                </div>
            </div>

            <div class="relative">
                <!-- Categories Table -->
                <div
                    class="relative flex flex-col w-full h-full overflow-x-auto text-gray-700 bg-white rounded-lg bg-clip-border {{ $isModalOpen ? 'blur-sm' : '' }}">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                            <tr class="">
                                <th class="p-4 border-b border-slate-200 bg-slate-50 w-16">
                                    <p class="text-sm font-normal leading-none text-slate-500">
                                        ID
                                    </p>
                                </th>
                                <th class="p-4 border-b border-slate-200 bg-slate-50 w-1/3">
                                    <p class="text-sm font-normal leading-none text-slate-500">
                                        Level Name
                                    </p>
                                </th>
                                <th class="p-4 border-b border-slate-200 bg-slate-50 w-1/3">
                                    <p class="text-sm font-normal leading-none text-slate-500">
                                        Level Code
                                    </p>
                                </th>
                                <th class="p-4 border-b border-slate-200 bg-slate-50 w-1/3">
                                    <p class="text-sm font-normal leading-none text-slate-500">
                                        Description
                                    </p>
                                </th>
                                <th class="p-4 border-b border-slate-200 bg-slate-50 w-32 text-right pr-8">
                                    <p class="text-sm font-normal leading-none text-slate-500">
                                        Action
                                    </p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr class="hover:bg-slate-50 border-b border-slate-200">
                                    <td class="p-4 py-5">
                                        <p class="block font-semibold text-sm text-slate-800">{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="p-4 py-5">
                                        <p class="text-sm text-slate-500">{{ $category->cat_title }}</p>
                                    </td>
                                    <td class="p-4 py-5">
                                        <p class="text-sm text-slate-500">{{ $category->cat_description }}</p>
                                    </td>
                                    <td class="p-4 py-5 text-right pr-8">
                                        <div class="flex items-center justify-end gap-2">
                                            <!-- Edit Icon Button -->
                                            <button wire:click="edit({{ $category->id }})"
                                                class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-full transition-colors duration-200"
                                                title="Edit Category">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </button>

                                            <!-- Delete Icon Button -->
                                            <button wire:click="destroy({{ $category->id }})"
                                                wire:confirm="Are you sure you want to delete this category?"
                                                class="p-2 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-full transition-colors duration-200"
                                                title="Delete Category">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <p class="text-gray-900">No level found</p>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="flex justify-between items-center px-4 py-3 gap-4">
                        <div class="text-sm text-slate-500">
                            Showing
                            <b>{{ $categories->firstItem() }}-{{ $categories->lastItem() }}</b>
                            of {{ $categories->total() }}
                        </div>

                        <div class="flex space-x-1">
                            <button wire:click="previousPage" wire:loading.attr="disabled"
                                class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease {{ $categories->onFirstPage() ? 'opacity-50 cursor-not-allowed' : '' }}">
                                Prev
                            </button>
                            @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                                <button wire:click="gotoPage({{ $page }})"
                                    class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal {{ $categories->currentPage() === $page ? 'text-white bg-slate-800 border-slate-800 hover:bg-slate-600 hover:border-slate-600' : 'text-slate-500 bg-white border-slate-200 hover:bg-slate-50 hover:border-slate-400' }} border rounded transition duration-200 ease">
                                    {{ $page }}
                                </button>
                            @endforeach
                            <button wire:click="nextPage" wire:loading.attr="disabled"
                                class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease {{ $categories->onLastPage() ? 'opacity-50 cursor-not-allowed' : '' }}">
                                Next
                            </button>
                        </div>
                    </div>
                </div>

                @if ($isModalOpen)
                    <div
                        class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto backdrop-blur-sm transition-all">
                        <!-- Backdrop with subtle blur -->
                        <div class="fixed inset-0 bg-gray-900/30" wire:click="closeModal"></div>

                        <!-- Modal Container -->
                        <div class="relative bg-white rounded-xl shadow-2xl p-6 w-full max-w-lg mx-4 transition-all transform
                    [@media(max-width:639px)]:mx-2 [@media(max-width:639px)]:p-4"
                            x-transition:enter="scale-95 opacity-0" x-transition:enter-end="scale-100 opacity-100">

                            <!-- Header -->
                            <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                                <h3 class="text-xl font-semibold text-gray-800">
                                    {{ $editingCategoryId ? 'Edit Category' : 'Add New Category' }}
                                </h3>
                                <button wire:click="closeModal"
                                    class="p-1.5 hover:bg-gray-50 rounded-lg text-gray-500 hover:text-gray-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Form -->
                            <form wire:submit.prevent="storeOrUpdate" class="space-y-5 mt-6">
                                <!-- Title Input -->
                                <div class="space-y-2">
                                    <label for="cat_title" class="block text-sm font-medium text-gray-700">Category
                                        title</label>
                                    <input type="text" wire:model="cat_title" id="cat_title"
                                        class="block w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500
                                  placeholder-gray-400 transition-shadow duration-200">
                                    @error('cat_title')
                                        <div class="flex items-center mt-1 text-sm text-red-600">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Description Input -->
                                <div class="space-y-2">
                                    <label for="cat_description"
                                        class="block text-sm font-medium text-gray-700">Category description</label>
                                    <textarea rows="4" wire:model="cat_description" id="cat_description"
                                        class="block w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500
                                     placeholder-gray-400 transition-shadow duration-200"></textarea>
                                    @error('cat_description')
                                        <div class="flex items-center mt-1 text-sm text-red-600">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                                    <button type="button" wire:click="closeModal"
                                        class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50
                                   transition-colors duration-200">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-5 py-2.5 rounded-lg bg-teal-600 hover:bg-teal-700 text-white
                                   transition-colors duration-200 shadow-sm hover:shadow-md">
                                        {{ $editingCategoryId ? 'Update Category' : 'Create Category' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

