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
                        class="px-4 py-2 rounded bg-teal-600 text-white w-full bg-teal-600 text-white py-3 rounded-xl transition duration-200 flex items-center justify-center hover:bg-teal-700">Log
                        In</button>
                </form>

                <a href="{{ route('auth.google') }}" class="btn btn-danger">
                    <i class="fab fa-google"></i> Login with Google
                </a>
                <div class="mt-6 space-y-4">
                    <div class="flex items-center">
                        <hr class="flex-grow border-gray-300"><span class="px-4 text-sm text-gray-500">Or</span>
                        <hr class="flex-grow border-gray-300">
                    </div>
                    <div class="space-y-3"><a href="{{ route('public.teacher.signup') }}" type="button"
                            class="px-4 py-2 rounded bg-teal-600 text-teal-600 w-full bg-white border-2 border-teal-600 py-3 rounded-xl hover:bg-teal-50 transition duration-200">Register
                            as Teacher</a>
                        <a href="{{ route('public.recruiter.signup') }}" type="button"
                            class="px-4 py-2 rounded bg-teal-600 text-teal-600 w-full bg-white border-2 border-teal-600 py-3 rounded-xl hover:bg-teal-50 transition duration-200">Register
                            as Recruiter</a>
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
