    <div>
        <div class="flex min-h-screen bg-cover bg-no-repeat bg-center bg-opacity-10"
            style="background-image: url('/bg.png'); background-color: rgba(13, 148, 136, 0.02)">
            <div class="w-full md:w-1/2 flex justify-center md:pl-16 lg:pl-24 xl:pl-32 mt-16 md:mt-0">
                <div class="w-full max-w-md bg-white/95 backdrop-blur-sm rounded-xl p-6 sm:p-8">
                    <div class="space-y-2 mb-6">
                        <h2 class="font-bold text-gray-500 text-lg sm:text-xl leading-tight">
                            Hello, <span class="text-teal-600">Recruiters</span>
                        </h2>
                        <h2 class="font-bold text-gray-500 text-2xl sm:text-3xl md:text-4xl leading-tight">
                            Signup To <span class="text-teal-600">PTPI</span>
                        </h2>
                    </div>

                    <form  class="space-y-4 sm:space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                    First Name
                                </label>
                                <div class="relative">
                                    <input type="text" wire:model.defer="Fname"
                                        class="w-full border-2 text-sm rounded-xl p-3 transition-colors border-gray-300 focus:border-teal-600"
                                        placeholder="Enter your first name">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-teal-600 h-5 w-5 hidden"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                @error('Fname')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                    Last Name
                                </label>
                                <div class="relative">
                                    <input type="text" wire:model.defer="Lname"
                                        class="w-full border-2 text-sm rounded-xl p-3 transition-colors border-gray-300 focus:border-teal-600"
                                        placeholder="Enter your last name">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-teal-600 h-5 w-5 hidden"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                @error('Lname')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Email
                            </label>
                            <div class="relative">
                                <input type="email" wire:model.defer="email"
                                    class="w-full border-2 text-sm rounded-xl p-3 transition-colors border-gray-300 focus:border-teal-600"
                                    placeholder="Enter your email">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-teal-600 h-5 w-5 hidden"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Password
                            </label>
                            <div class="relative">
                                <input type="password" wire:model.defer="password"
                                    class="w-full border-2 text-sm rounded-xl p-3 transition-colors border-gray-300 focus:border-teal-600"
                                    placeholder="Enter your password" x-data="{ show: false }"
                                    :type="show ? 'text' : 'password'">
                                <button type="button"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 transition-colors"
                                    x-on:click="show = !show">
                                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                                        <path fill-rule="evenodd"
                                            d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <!-- Password Criteria -->
                            <div class="mt-2 space-y-1">
                                <p class="text-xs text-gray-500">
                                    ✓ At least 8 characters
                                </p>
                                <p class="text-xs text-gray-500">
                                    ✓ Contains a number
                                </p>
                                <p class="text-xs text-gray-500">
                                    ✓ Contains a special character
                                </p>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-teal-600 text-white py-3 rounded-xl transition duration-200 flex items-center justify-center hover:bg-teal-700">
                            Sign Up as Recruiter
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <a href="#"
                            class="w-full inline-flex items-center justify-center px-4 py-3 bg-teal-600 text-sm font-medium rounded-xl text-white hover:bg-teal-700 transition duration-200">
                            Sign up as Teacher
                        </a>

                        <div class="relative mt-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">or</span>
                            </div>
                        </div>

                        <a href=""
                            class="mt-4 w-full inline-flex items-center justify-center px-4 py-3 border border-teal-600 text-sm font-medium rounded-xl text-teal-600 bg-white hover:bg-teal-50 transition duration-200">
                            Already have an account? Sign in
                        </a>
                    </div>
                </div>
            </div>

            <!-- Timeline - Hidden on mobile, shown on md screens and up -->
            <div class="hidden md:flex w-1/2 flex-col justify-center pl-16 lg:pl-24">
                <!-- Step 1 -->
                <div class="flex items-start space-x-4 mb-8">
                    <div class="flex flex-col items-center">
                        <div
                            class="w-10 h-10 flex items-center justify-center rounded-full bg-teal-600 text-white font-bold text-lg">
                            1
                        </div>
                        <div class="h-16 w-1 bg-teal-600"></div>
                    </div>
                    <div class="pt-2">
                        <h3 class="text-gray-700 font-bold text-xl">
                            Get Signup Completed
                        </h3>
                        <p class="text-gray-500 mt-1">
                            Create your recruiter account
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="flex items-start space-x-4 mb-8">
                    <div class="flex flex-col items-center">
                        <div
                            class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold text-lg">
                            2
                        </div>
                        <div class="h-16 w-1 bg-gray-300"></div>
                    </div>
                    <div class="pt-2">
                        <h3 class="text-gray-700 font-bold text-xl">
                            Select Teacher in Progress
                        </h3>
                        <p class="text-gray-500 mt-1">
                            Browse and select potential candidates
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="flex items-start space-x-4 mb-8">
                    <div class="flex flex-col items-center">
                        <div
                            class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold text-lg">
                            3
                        </div>
                        <div class="h-16 w-1 bg-gray-300"></div>
                    </div>
                    <div class="pt-2">
                        <h3 class="text-gray-700 font-bold text-xl">
                            Take Interview
                        </h3>
                        <p class="text-gray-500 mt-1">
                            Schedule and conduct interviews
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="flex items-start space-x-4">
                    <div class="flex flex-col items-center">
                        <div
                            class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold text-lg">
                            4
                        </div>
                    </div>
                    <div class="pt-2">
                        <h3 class="text-gray-700 font-bold text-xl">
                            Hire Teacher
                        </h3>
                        <p class="text-gray-500 mt-1">
                            Complete the hiring process
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
