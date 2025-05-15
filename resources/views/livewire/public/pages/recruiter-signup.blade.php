<div>
    <div class="flex min-h-screen bg-cover bg-no-repeat bg-center" style="background-image: url('/bg.png')">
        <div class="w-full md:w-1/2 flex justify-center md:pl-16 lg:pl-24 xl:pl-32 mt-16 md:mt-0">
            <div class="w-full max-w-md bg-white rounded-xl p-6 sm:p-8">
                <div class="space-y-2 mb-6">
                    <h2 class="font-bold text-gray-500 text-lg sm:text-xl leading-tight">
                        Hello, <span class="text-teal-600">Recruiters</span>
                    </h2>
                    <h2 class="font-bold text-gray-500 text-2xl sm:text-3xl md:text-4xl leading-tight">
                        @if (!$showOtpForm)
                            Signup To <span class="text-teal-600">PTPI</span>
                        @else
                            Verify Your Email
                        @endif
                    </h2>
                </div>

                @if (session()->has('message'))
                    <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg">
                        {{ session('message') }}
                    </div>
                @endif

                @error('general')
                    <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg">
                        {{ $message }}
                    </div>
                @enderror

                @if (!$showOtpForm)
                    <form wire:submit="submitRegistrationForm" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">First Name</label>
                                <div class="relative">
                                    <div class="w-full">
                                        <input type="text" 
                                               wire:model="Fname" 
                                               class="w-full border-2 text-sm rounded-xl p-3 pr-10 transition-colors border-teal-600 focus:border-teal-600"
                                               placeholder="Enter your first name">
                                        @error('Fname') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                        <svg class="text-teal-600" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Last Name</label>
                                <div class="relative">
                                    <div class="w-full">
                                        <input type="text" 
                                               wire:model="Lname" 
                                               class="w-full border-2 text-sm rounded-xl p-3 pr-10 transition-colors border-teal-600 focus:border-teal-600"
                                               placeholder="Enter your last name">
                                        @error('Lname') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                        <svg class="text-teal-600" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                            <div class="relative">
                                <div class="w-full">
                                    <input type="email" 
                                           wire:model="email" 
                                           class="w-full border-2 text-sm rounded-xl p-3 pr-10 transition-colors border-teal-600 focus:border-teal-600"
                                           placeholder="Enter your email address">
                                    @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                    <svg class="text-teal-600" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                            <div class="relative">
                                <div class="w-full">
                                    <input type="password" 
                                           wire:model="password" 
                                           class="w-full border-2 text-sm rounded-xl p-3 pr-10 transition-colors border-teal-600 focus:border-teal-600"
                                           placeholder="Enter your password">
                                    @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                    <svg class="text-teal-600" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                            Sign Up
                        </button>
                    </form>
                @else
                    <div class="space-y-4">
                        <p class="text-gray-600">We've sent a verification code to {{ $email }}</p>

                        <form wire:submit="verifyOtp" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Enter 6-digit OTP</label>
                                <input type="text" wire:model="otp" maxlength="6" class="mt-1 p-2 border block w-full rounded-xl border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500" placeholder="000000">
                                @error('otp') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>

                            <button type="submit" class="w-full py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                Verify OTP
                            </button>

                            <div class="text-center">
                                <button type="button" wire:click="resendOtp" class="text-teal-600 text-sm hover:underline">
                                    Resend OTP
                                </button>
                            </div>
                        </form>
                    </div>
                @endif

                <div class="mt-6 text-center">
                    <a wire:navigate href="{{ route('public.teacher.signup') }}"
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

                    <a wire:navigate href="{{ route('login') }}"
                        class="mt-4 w-full inline-flex items-center justify-center px-4 py-3 border border-teal-600 text-sm font-medium rounded-xl text-teal-600 bg-white hover:bg-teal-50 transition duration-200">
                        Already have an account? Sign in
                    </a>
                </div>
            </div>
        </div>

        <!-- Timeline section -->
        <div class="hidden md:flex w-1/2 flex-col justify-center pl-16 lg:pl-24">
            <!-- Step 1 -->
            <div class="flex items-start space-x-4 mb-8">
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full {{ !$showOtpForm ? 'bg-teal-600 text-white' : 'bg-gray-300 text-gray-600' }} font-bold text-lg">
                        1
                    </div>
                    <div class="h-16 w-1 {{ !$showOtpForm ? 'bg-teal-600' : 'bg-gray-300' }}"></div>
                </div>
                <div class="pt-2">
                    <h3 class="text-gray-700 font-bold text-xl">Create Account</h3>
                    <p class="text-gray-500 mt-1">Fill in your details to create your account</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="flex items-start space-x-4 mb-8">
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full {{ $showOtpForm ? 'bg-teal-600 text-white' : 'bg-gray-300 text-gray-600' }} font-bold text-lg">
                        2
                    </div>
                    <div class="h-16 w-1 bg-gray-300"></div>
                </div>
                <div class="pt-2">
                    <h3 class="text-gray-700 font-bold text-xl">Verify Email</h3>
                    <p class="text-gray-500 mt-1">Confirm your email address</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="flex items-start space-x-4">
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold text-lg">
                        3
                    </div>
                </div>
                <div class="pt-2">
                    <h3 class="text-gray-700 font-bold text-xl">Complete Profile</h3>
                    <p class="text-gray-500 mt-1">Set up your recruiter profile</p>
                </div>
            </div>
        </div>
    </div>
</div>
