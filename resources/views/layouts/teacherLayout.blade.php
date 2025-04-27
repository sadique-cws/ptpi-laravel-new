<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="w-full flex">
        <div class="">
            <livewire:teacher.components.sidebar />
        </div>
        <div class="flex flex-col w-full min-h-screen bg-gray-100">
            <div
                class="flex items-center justify-between px-4 py-3 bg-gradient-to-r from-[#3E98C7] to-[#2A6F97] text-white shadow-md -z-10 md:z-0">
                <!-- Left Section -->
                <div class="flex items-center gap-4">
                    <button
                        class="p-2 rounded-md bg-white/10 hover:bg-white/20 transition duration-200 md:hidden focus:outline-none focus:ring-2 focus:ring-white/50"
                        @click="$dispatch('toggle-menu')" aria-label="Toggle menu">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h1 class="text-lg font-semibold hidden md:block">Teacher Dashboard</h1>
                </div>

                <!-- Right Section - Action Buttons -->
                <div class="flex items-center gap-4">
                    <a href="/"
                        class="p-2 rounded-full bg-white/10 hover:bg-white/20 transition duration-200 focus:outline-none focus:ring-2 focus:ring-white/50"
                        aria-label="Home">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </a>

                    <!-- Notifications Dropdown -->
                    <div class="relative" x-data="{ showNotifications: false }">
                        <button
                            class="p-2 rounded-full bg-white/10 hover:bg-white/20 transition duration-200 focus:outline-none focus:ring-2 focus:ring-white/50 relative"
                            aria-label="Notifications" @click="showNotifications = !showNotifications">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span x-show="$wire.unreadCount > 0"
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                                5
                            </span>
                        </button>

                        <!-- Notifications Panel -->
                        <div x-show="showNotifications" @click.away="showNotifications = false"
                            class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg overflow-hidden z-50">
                            <div class="p-3 border-b border-gray-100 bg-gray-50">
                                <div class="flex justify-between items-center">
                                    <h3 class="font-semibold text-gray-800">Notifications</h3>
                                    <span x-show="$wire.unreadCount > 0" class="text-xs font-medium text-blue-600">
                                        2 unread
                                    </span>
                                </div>
                            </div>


                            <div class="p-2 border-t border-gray-100 bg-gray-50 text-center">
                                <button class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                                    View all notifications
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- User Profile Dropdown -->
                    <div class="relative" x-data="{ dropdownOpen: false }">
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="flex items-center gap-2 pl-2 focus:outline-none">
                            <div class="hidden md:flex flex-col items-end text-right">
                                <span class="font-medium text-white text-sm leading-tight">
                                    Rahul Kumar
                                </span>
                                <span class="text-xs text-blue-100 leading-tight">rahul@gmail.com</span>
                            </div>
                            <div class="h-9 w-9 rounded-full bg-white/20 flex items-center justify-center">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </button>

                        <!-- Dropdown Content -->
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg overflow-hidden z-50">
                            <div class="px-4 py-2 border-b">
                                <p class="text-sm font-medium text-gray-700">Teacher Code</p>
                                <p class="text-sm text-gray-500">R468434</p>
                            </div>
                            <button wire:click="logout"
                                class="flex items-center w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
           <div class="">
            {{ $slot}}
           </div>
        </div>
    </div>


    <div class="flex">

    </div>


</body>

</html>
