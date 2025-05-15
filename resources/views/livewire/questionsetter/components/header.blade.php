<header class="bg-white shadow">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="#" class="flex items-center">
                    <span class="text-2xl font-bold text-teal-600">PTP</span>
                    <span class="ml-2 text-sm font-medium text-gray-900">Question Setter</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex md:space-x-8">
                <a href="#" 
                   class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 hover:text-teal-600 transition-colors">
                    Dashboard
                </a>
                <a href="#" 
                   class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-teal-600 transition-colors">
                    My Profile
                </a>
                <a href="#" 
                   class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-teal-600 transition-colors">
                    Reports
                </a>
            </nav>

            <!-- Right Section -->
            <div class="flex items-center space-x-6">
                <!-- Notifications -->
                <button type="button" class="relative p-1 text-gray-400 hover:text-gray-500 focus:outline-none">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 text-xs font-medium text-white">
                        2
                    </span>
                </button>

                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <div>
                        <button 
                            wire:click="toggleProfileMenu"
                            type="button" 
                            class="flex items-center space-x-3 focus:outline-none"
                        >
                            <div class="hidden md:flex md:items-center md:space-x-2">
                                <span class="text-sm font-medium text-gray-900">{{ auth()->user()->first_name }}</span>
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="relative h-8 w-8 rounded-full bg-teal-600 text-white flex items-center justify-center">
                                @if(auth()->user()->image)
                                    <img src="{{ auth()->user()->image }}" alt="{{ auth()->user()->first_name }}" 
                                         class="h-8 w-8 rounded-full object-cover">
                                @else
                                    <span class="text-sm font-medium">
                                        {{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }}
                                    </span>
                                @endif
                            </div>
                        </button>
                    </div>

                    @if($showProfileMenu)
                        <div class="absolute right-0 mt-2 w-48 rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Your Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Settings
                            </a>
                            <button wire:click="logout" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">
                                Sign out
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
