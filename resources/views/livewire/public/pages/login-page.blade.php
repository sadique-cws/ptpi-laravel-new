<div class="min-h-screen flex flex-col">


    <div class="flex min-h-screen bg-cover bg-no-repeat bg-center" style="background-image: url(&quot;/bg.png&quot;);">
        <div class="w-full md:w-1/2 flex justify-center md:pl-16 lg:pl-24 xl:pl-32 mt-16 md:mt-0">
            <div class="w-full max-w-md bg-white rounded-xl p-6 sm:p-8">
                <div class="space-y-2 mb-6">
                    <h2 class="font-bold text-gray-500 text-lg sm:text-xl leading-tight">Hello, <span
                            class="text-teal-600">User</span></h2>
                    <h2 class="font-bold text-gray-500 text-2xl sm:text-3xl md:text-4xl leading-tight">Sign in to <span
                            class="text-teal-600">PTPI</span></h2>
                </div>
                <form wire:submit.prevent="login" class="space-y-4 sm:space-y-5">
                    <div><label class="block text-sm font-medium text-gray-700 mb-1.5" for="email">Email</label>
                        <div class="relative">
                            <div class="w-full">
                                <input wire:model.blur="email" type="email"
                                    class="w-full border-2 text-sm rounded-xl p-3 pr-10 transition-colors border-teal-600 focus:border-teal-600"
                                    placeholder="Enter your email" id="email" name="email">
                                @error('email')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="absolute right-3 top-1/2 -translate-y-1/2"><svg stroke="currentColor"
                                    fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="text-teal-600"
                                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">
                                    </path>
                                </svg></div>
                        </div>
                    </div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-1.5" for="pass">Password</label>
                        <div class="relative">
                            <div class="w-full"><input wire:model.blur="password" type="password"
                                    class="w-full border-2 text-sm rounded-xl p-3 pr-10 transition-colors border-teal-600 focus:border-teal-600"
                                    placeholder="Enter your password" id="pass" name="password">
                                @error('password')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div><button type="button"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 transition-colors"><svg
                                    stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512"
                                    height="18" width="18" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                    </path>
                                </svg></button>
                        </div>
                    </div><button type="submit"
                        class="px-4 py-3 rounded-xl bg-teal-600 text-white w-full transition duration-200 flex items-center justify-center hover:bg-teal-700">Log
                        In</button>
                </form>

                <div class="mt-6">
                    <a navigate href="{{ route('auth.google') }}"
                        class="w-full flex items-center justify-center gap-2 bg-white border-2 border-gray-200 p-3 rounded-xl hover:bg-gray-50 transition duration-200">
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="#EA4335"
                                d="M5.266 9.765A7.077 7.077 0 0 1 12 4.909c1.69 0 3.218.6 4.418 1.582L19.91 3C17.782 1.145 15.055 0 12 0 7.27 0 3.198 2.698 1.24 6.65l4.026 3.115Z" />
                            <path fill="#34A853"
                                d="M16.04 18.013c-1.09.703-2.474 1.078-4.04 1.078a7.077 7.077 0 0 1-6.723-4.823l-4.04 3.067A11.965 11.965 0 0 0 12 24c2.933 0 5.735-1.043 7.834-3l-3.793-2.987Z" />
                            <path fill="#4A90E2"
                                d="M19.834 21c2.195-2.048 3.62-5.096 3.62-9 0-.71-.109-1.473-.272-2.182H12v4.637h6.436c-.317 1.559-1.17 2.766-2.395 3.558L19.834 21Z" />
                            <path fill="#FBBC05"
                                d="M5.277 14.268A7.12 7.12 0 0 1 4.909 12c0-.782.125-1.533.357-2.235L1.24 6.65A11.934 11.934 0 0 0 0 12c0 1.92.445 3.73 1.237 5.335l4.04-3.067Z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-700">Continue with Google</span>
                    </a>
                </div>
                <div class="mt-6 space-y-4 w-full">
                    <div class="flex items-center">
                        <hr class="flex-grow border-gray-300"><span class="px-4 text-sm text-gray-500">Or</span>
                        <hr class="flex-grow border-gray-300">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full">
                        <a wire:navigate href="{{ route('public.teacher.signup') }}"
                            class="block text-center text-teal-600 bg-white border-2 border-teal-600 py-3 rounded-xl hover:bg-teal-50 transition duration-200">
                            Register as Teacher
                        </a>
                        <a wire:navigate href="{{ route('public.recruiter.signup') }}"
                            class="block text-center text-teal-600 bg-white border-2 border-teal-600 py-3 rounded-xl hover:bg-teal-50 transition duration-200">
                            Register as Recruiter
                        </a>
                    </div>
                </div>


            </div>
        </div>
        <div class="hidden md:flex w-1/2 flex-col justify-center pl-16 lg:pl-24">
            <div class="flex items-start space-x-4 mb-8">
                <div class="flex flex-col items-center">
                    <div
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-teal-600 text-white font-bold text-lg">
                        1</div>
                    <div class="h-16 w-1 bg-teal-600"></div>
                </div>
                <div class="pt-2">
                    <h3 class="text-gray-700 font-bold text-xl">Enter Credentials</h3>
                    <p class="text-gray-500 mt-1">Sign in with your registered email and password</p>
                </div>
            </div>
            <div class="flex items-start space-x-4 mb-8">
                <div class="flex flex-col items-center">
                    <div
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold text-lg">
                        2</div>
                    <div class="h-16 w-1 bg-gray-300"></div>
                </div>
                <div class="pt-2">
                    <h3 class="text-gray-700 font-bold text-xl">Login Successful</h3>
                    <p class="text-gray-500 mt-1">Verification and authentication complete</p>
                </div>
            </div>
            <div class="flex items-start space-x-4">
                <div class="flex flex-col items-center">
                    <div
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-300 text-gray-600 font-bold text-lg">
                        3</div>
                </div>
                <div class="pt-2">
                    <h3 class="text-gray-700 font-bold text-xl">Go to Dashboard</h3>
                    <p class="text-gray-500 mt-1">Access your personalized dashboard</p>
                </div>

            </div>
        </div>
    </div>
</div>
