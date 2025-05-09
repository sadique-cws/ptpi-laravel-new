<div>
    <div class="">
        <div class="">
            <div class="flex gap-3 flex-col md:flex-row justify-between md:items-center mb-6">
                <div class="flex flex-wrap justify-between items-center">
                    <h2 class="md:text-xl text-lg font-semibold text-slate-500 border-s-4 border-s-purple-800 pl-3">
                        Manage Level
                    </h2>
                </div>
                <div class="flex gap-3 items-center">
                    <button type="button" wire:click="openModal"
                        class="bg-teal-700 hover:bg-teal-600 text-white font-bold px-4 py-2 rounded">
                        Add Level
                    </button>
                </div>
            </div>

            <div class="relative">
                <!-- Level Table -->
                <div class="relative flex flex-col w-full h-full overflow-x-auto text-gray-700 bg-white rounded-lg bg-clip-border {{ $isModalOpen ? 'blur-sm' : '' }}">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-b border-slate-200 bg-slate-50 w-16">
                                    <p class="text-sm font-normal leading-none text-slate-500">ID</p>
                                </th>
                                <th class="p-4 border-b border-slate-200 bg-slate-50 w-1/3">
                                    <p class="text-sm font-normal leading-none text-slate-500">Level Name</p>
                                </th>
                                <th class="p-4 border-b border-slate-200 bg-slate-50 w-1/3">
                                    <p class="text-sm font-normal leading-none text-slate-500">Level Code</p>
                                </th>
                                <th class="p-4 border-b border-slate-200 bg-slate-50 w-32 text-right pr-8">
                                    <p class="text-sm font-normal leading-none text-slate-500">Action</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($levels as $level)
                                <tr class="hover:bg-slate-50 border-b border-slate-200">
                                    <td class="px-5 py-3">
                                        <p class="block font-semibold text-sm text-slate-800">{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="px-5 py-3">
                                        <p class="text-sm text-slate-500">{{ $level->level_name }}</p>
                                    </td>
                                    <td class="px-5 py-3">
                                        <p class="text-sm text-slate-500">{{ $level->level_code }}</p>
                                    </td>
                                    <td class="px-5 py-3 text-right pr-8">
                                        <div class="flex items-center justify-end gap-2">
                                            <button wire:click="edit({{ $level->id }})"
                                                class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-full transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </button>
                                            <button wire:click="destroy({{ $level->id }})"
                                                wire:confirm="Are you sure you want to delete this level?"
                                                class="p-2 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-full transition-colors duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <p class="text-gray-900">No levels found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($isModalOpen)
                    <div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto backdrop-blur-sm transition-all">
                        <div class="fixed inset-0 bg-gray-900/30" wire:click="closeModal"></div>

                        <div class="relative bg-white rounded-xl shadow-2xl p-6 w-full max-w-lg mx-4 transition-all transform">
                            <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                                <h3 class="text-xl font-semibold text-gray-800">
                                    {{ $editingLevelId ? 'Edit Level' : 'Add New Level' }}
                                </h3>
                                <button wire:click="closeModal"
                                    class="p-1.5 hover:bg-gray-50 rounded-lg text-gray-500 hover:text-gray-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <form wire:submit.prevent="storeOrUpdate" class="space-y-5 mt-6">
                                <div class="space-y-2">
                                    <label for="level_name" class="block text-sm font-medium text-gray-700">Level Name</label>
                                    <input type="text" wire:model="level_name" id="level_name"
                                        class="block w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 placeholder-gray-400 transition-shadow duration-200">
                                    @error('level_name')
                                        <div class="flex items-center mt-1 text-sm text-red-600">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label for="level_code" class="block text-sm font-medium text-gray-700">Level Code</label>
                                    <input type="text" wire:model="level_code" id="level_code"
                                        class="block w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 placeholder-gray-400 transition-shadow duration-200">
                                    @error('level_code')
                                        <div class="flex items-center mt-1 text-sm text-red-600">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                                    <button type="button" wire:click="closeModal"
                                        class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-5 py-2.5 rounded-lg bg-teal-600 hover:bg-teal-700 text-white transition-colors duration-200 shadow-sm hover:shadow-md">
                                        {{ $editingLevelId ? 'Update Level' : 'Create Level' }}
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

