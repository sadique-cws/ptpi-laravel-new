<div>
    <nav class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <button
                        wire:click="$dispatch('toggleMobileMenu')"
                        class="md:hidden p-2 text-gray-600 hover:text-teal-600 transition-colors">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                            stroke-linejoin="round" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </button>
                    <a wire:navigate class="text-xl font-bold text-gray-800" href="/">
                        PTP <span class="text-teal-600">INSTITUTE</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-3">
                    <button
                        wire:click="searchTeachers"
                        class="group relative overflow-hidden bg-gradient-to-r from-teal-500 via-teal-600 to-teal-500 bg-[length:200%_auto] transition-all duration-500 hover:bg-right-bottom hover:shadow-2xl px-6 py-3 rounded-xl font-semibold text-white hover:-translate-y-0.5 transform shadow-lg hover:shadow-teal-500/30">
                        <span class="relative flex items-center justify-center gap-2">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                stroke-linejoin="round" class="w-5 h-5 transition-transform group-hover:rotate-12"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                            <span class="bg-gradient-to-r from-white/90 to-white bg-clip-text text-transparent relative animate-pulse">
                                शिक्षक खोजें
                            </span>
                        </span>
                        <!-- ... existing button effects ... -->
                    </button>

                    @auth
                        <div class="relative">
                            <button wire:click="toggleDropdown" 
                                    class="flex items-center gap-2 px-4 py-2 rounded-xl border-2 border-teal-500 hover:bg-teal-50 transition-all duration-200">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-teal-100 rounded-full flex items-center justify-center capitalize text-teal-600 font-semibold">
                                        {{ substr($user->first_name, 0, 1) }}
                                    </div>
                                    <div class="text-left">
                                        <div class="text-sm font-semibold text-gray-800 capitalize">
                                            {{ $user->first_name }} {{ $user->last_name }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            @if($dropdownOpen)
                                <div class="absolute right-0 mt-2 w-48 rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-50">
                                    <div class="px-4 py-3">
                                        <p class="text-sm text-gray-600">Signed in as</p>
                                        <p class="text-sm font-medium text-gray-900 truncate">{{ $user->email }}</p>
                                    </div>
                                    
                                    <div class="py-1">
                                        <div class="px-4 py-2 text-sm text-gray-500">
                                            Role: <span class="font-medium text-teal-600">{{ $this->getRoleDisplay() }}</span>
                                        </div>
                                    </div>

                                    <div class="py-1">
                                        <a wire:navigate href="{{ route($user->role->value . '.dashboard') }}"
                                           class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-teal-50">
                                            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            Dashboard
                                        </a>
                                    </div>

                                    <div class="py-1">
                                        <button wire:click="logout" 
                                                class="group flex w-full items-center px-4 py-2 text-sm text-red-700 hover:bg-red-50">
                                            <svg class="mr-3 h-5 w-5 text-red-400 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            Logout
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="flex gap-2">
                            <a wire:navigate class="flex items-center gap-2 px-3 py-2.5 font-medium text-teal-600 transition-all duration-300 border-2 border-teal-500 rounded-lg hover:bg-purple-50 hover:shadow-md"
                                href="{{ route('login') }}">
                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-5 h-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span>Login</span>
                            </a>

                            <a wire:navigate class="flex items-center gap-2 px-3 py-2.5 font-medium text-teal-600 transition-all duration-300 border-2 border-teal-500 rounded-lg hover:bg-purple-50 hover:shadow-md"
                                href="{{ route('public.teacher.signup') }}">
                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-5 h-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                </svg>
                                <span>Register as a Teacher</span>
                            </a>

                            <a wire:navigate class="flex items-center gap-2 px-3 py-2.5 font-medium text-teal-600 transition-all duration-300 border-2 border-teal-500 rounded-lg hover:bg-blue-50 hover:shadow-md"
                                href="{{ route('public.recruiter.signup') }}">
                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-5 h-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                </svg>
                                <span>Recruiter Sign Up</span>
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="md:hidden {{ $mobileMenuOpen ? 'fixed inset-0 z-50' : 'hidden' }}">
            <div class="fixed inset-0 bg-black opacity-25" wire:click="toggleMobileMenu"></div>
            <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-xl transform transition-transform duration-300 {{ $mobileMenuOpen ? 'translate-x-0' : '-translate-x-full' }}">
                <div class="p-4 border-b">
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-gray-800">
                            PTP <span class="text-teal-600">INSTITUTE</span>
                        </span>
                        <button wire:click="$dispatch('toggleMobileMenu')" 
                                class="p-2 text-gray-600 hover:text-teal-600">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                stroke-linejoin="round" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="p-4 space-y-4">
                    <div class="space-y-3">
                        <a wire:navigate 
                           class="flex items-center gap-2 w-full px-4 py-2.5 font-medium text-teal-600 transition-all duration-300 border-2 border-teal-500 rounded-lg hover:bg-purple-50 hover:shadow-md justify-center"
                           href="{{ route('login') }}">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                stroke-linejoin="round" class="w-5 h-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Login</span>
                        </a>

                        <a wire:navigate 
                           class="flex items-center gap-2 w-full px-4 py-2.5 font-medium text-teal-600 transition-all duration-300 border-2 border-teal-500 rounded-lg hover:bg-purple-50 hover:shadow-md justify-center"
                           href="{{ route('public.teacher.signup') }}">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                stroke-linejoin="round" class="w-5 h-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                            <span>Register as a Teacher</span>
                        </a>

                        <a wire:navigate 
                           class="flex items-center gap-2 w-full px-4 py-2.5 font-medium text-teal-600 transition-all duration-300 border-2 border-teal-500 rounded-lg hover:bg-blue-50 hover:shadow-md justify-center"
                           href="{{ route('public.recruiter.signup') }}">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                stroke-linejoin="round" class="w-5 h-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                            <span>Recruiter Sign Up</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
