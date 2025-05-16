<div>
    <div class="">
    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- Error Message -->
    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Manage Job Roles</h2>
        <button 
            wire:click="openModal"
            class="bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-lg transition-colors"
        >
            Add New Job Role
        </button>
    </div>

    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($jobRoles as $role)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $role->role_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $role->created_at->format('M d, Y H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button
                                wire:click="editJobRole({{ $role->id }})"
                                class="text-indigo-600 hover:text-indigo-900 mr-4"
                            >
                                Edit
                            </button>
                            <button
                                onclick="confirm('Are you sure you want to delete this job role?') || event.stopImmediatePropagation()"
                                wire:click="deleteJobRole({{ $role->id }})"
                                class="text-red-600 hover:text-red-900"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                            No job roles found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    @if($showModal)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg w-full max-w-md">
            <div class="p-6">
                <!-- Modal Header with Close Button -->
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-lg font-semibold">
                        {{ $jobRoleId ? 'Edit Job Role' : 'Create New Job Role' }}
                    </h3>
                    <button 
                        type="button" 
                        wire:click="closeModal"
                        class="text-gray-400 hover:text-gray-500 transition-colors"
                    >
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>

                <form wire:submit.prevent="createAndUpdateJobRole">
                    <div class="mb-4">
                        <label for="role_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Role Name
                        </label>
                        <input
                            type="text"
                            wire:model="role_name"
                            id="role_name"
                            class="w-full px-3 py-2 border rounded-md @error('role_name') border-red-500 @else border-gray-300 @enderror"
                            autofocus
                        >
                        @error('role_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button
                            type="button"
                            wire:click="closeModal"
                            class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-md"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="px-4 py-2 bg-teal-600 text-white rounded-md hover:bg-teal-700"
                        >
                            {{ $jobRoleId ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
</div>
</div>
