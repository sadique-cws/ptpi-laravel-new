<div>
    <div class="flex min-h-screen bg-cover bg-no-repeat bg-center" style="background-image: url('/bg.png')">
        <div class="w-full md:w-1/2 flex justify-center md:pl-16 lg:pl-24 xl:pl-32 mt-16 md:mt-0">
            <div class="w-full max-w-md bg-white rounded-xl p-6 sm:p-8">
                <div class="space-y-2 mb-6">
                    <h2 class="font-bold text-gray-500 text-lg sm:text-xl leading-tight">
                        Hello, <span class="text-teal-600">Teachers</span>
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
                        <div>
                            <label class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" wire:model="Fname" class="mt-1 p-2 border block w-full rounded-xl border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                            @error('Fname') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" wire:model="Lname" class="mt-1 p-2 border block w-full rounded-xl border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                            @error('Lname') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" wire:model="email" class="mt-1 p-2 border block w-full rounded-xl border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                            @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" wire:model="password" class="mt-1 p-2 border block w-full rounded-xl border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                            @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
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
                    <a href="{{ route('public.recruiter.signup') }}"
                        class="w-full inline-flex items-center justify-center px-4 py-3 bg-teal-600 text-sm font-medium rounded-xl text-white hover:bg-teal-700 transition duration-200">
                        Sign up as Recruiter
                    </a>

                    <div class="relative mt-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">or</span>
                        </div>
                    </div>

                    <a href="{{ route('login') }}"
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
                    <p class="text-gray-500 mt-1">Set up your teacher profile</p>
                </div>
            </div>
        </div>
    </div>
</div>
