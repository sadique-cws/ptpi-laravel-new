<div>
    <!-- Sidebar Drawer -->
    <div class="fixed top-0 left-0 h-full w-72 bg-slate-50 shadow-2xl transform transition-transform duration-300 ease-in-out md:translate-x-0 md:fixed md:z-40"
        :class="{ '-translate-x-full': !isOpen, 'translate-x-0': isOpen }">
        <!-- Profile Section -->
        <div class="flex flex-col h-screen bg-white">
            <div class="flex flex-col justify-center py-2 border-b-2 border-white">
                <h1 class="font-bold text-2xl text-gray-700 text-center">PTPI</h1>
                <p class="text-sm text-center text-[#3E98C7] font-semibold mb-2">
                    Private Teacher Provider Institute.
                </p>
            </div>

            <!-- Profile Section -->
            <div class="flex items-center gap-3 py-3 bg-[#F5F8FA] px-4 rounded-lg shadow-sm">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="p-2 bg-[#E5F1F9] rounded-full flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="flex flex-col min-w-0">
                        <h2 class="text-md font-semibold text-gray-800 truncate">Your Name</h2>
                        <p class="text-sm text-gray-600 truncate">email@example.com</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col flex-1 justify-between">
                <nav class="w-full mt-1">
                    <a href="/teacher"
                        class="block py-3 px-4 text-gray-500 hover:bg-[#F5F8FA] transition flex items-center gap-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        Dashboard
                    </a>

                    <a href="/teacher/personal-profile"
                        class="block py-3 px-4 text-gray-500 hover:bg-[#F5F8FA] transition flex items-center gap-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Personal Details
                    </a>

                    <a href="/teacher/job-profile"
                        class="block py-3 px-4 text-gray-500 hover:bg-[#F5F8FA] transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Job Details
                    </a>
                </nav>

                <div class="flex flex-col">
                    <div class="border-t border-gray-200">
                        <a href="/teacher/setting" class="flex items-center gap-1 text-md text-gray-500 py-2 px-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Setting
                        </a>
                    </div>
                    <div class="border-t border-gray-200">
                        <button class="flex items-center gap-1 text-md text-red-500 py-2 px-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden" x-show="isOpen" @click="isOpen = false">
    </div>
</div>
