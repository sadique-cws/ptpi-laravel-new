<div class="min-h-screen flex flex-col">
    <!-- Header -->
    <div class="bg-teal-600 text-white py-4 px-8 text-xl font-bold">
        PTP INSTITUTE
    </div>

    <!-- Main Content -->
    <div class="flex flex-1 p-8">
        <!-- Left Section - Form -->
        <div class="w-full md:w-1/2 flex flex-col justify-center items-start px-8 md:px-12">
            <h2 class="text-2xl font-semibold mb-2">
                Hello, <span class="text-teal-600">User</span>
            </h2>
            <h1 class="text-3xl font-bold mb-8">
                Sign in to <span class="text-teal-600">PTPI</span>
            </h1>

            <form class="w-full">
                <div class="mb-6">
                    <input
                        type="email"
                        placeholder="Enter your email"
                        class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-teal-500"
                    />
                </div>
                <div class="mb-6">
                    <input
                        type="password"
                        placeholder="Enter your password"
                        class="w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-teal-500"
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-teal-500 hover:bg-teal-600 text-white font-semibold py-3 rounded-md"
                >
                    Log In
                </button>
            </form>

            <div class="flex items-center my-6 w-full">
                <hr class="flex-grow border-gray-300" />
                <span class="mx-4 text-gray-400">Or</span>
                <hr class="flex-grow border-gray-300" />
            </div>

            <div class="flex flex-col w-full gap-4">
                <a href="#" class="border-2 border-teal-500 text-teal-500 hover:bg-teal-50 font-semibold py-3 rounded-md text-center">
                    Register as Teacher
                </a>
                <a href="#" class="border-2 border-teal-500 text-teal-500 hover:bg-teal-50 font-semibold py-3 rounded-md text-center">
                    Register as Recruiter
                </a>
            </div>
        </div>

        <!-- Right Section - Steps and Image -->
        <div class="hidden md:flex w-1/2 relative flex-col justify-center px-8 md:px-12">
            <div class="space-y-10">
                <div class="flex items-start gap-4">
                    <div class="text-teal-600 font-bold text-lg">1</div>
                    <div>
                        <h3 class="text-lg font-semibold">Enter Credentials</h3>
                        <p class="text-gray-500 text-sm">
                            Sign in with your registered email and password
                        </p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="text-gray-400 font-bold text-lg">2</div>
                    <div>
                        <h3 class="text-lg font-semibold">Login Successful</h3>
                        <p class="text-gray-500 text-sm">
                            Verification and authentication complete
                        </p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="text-gray-400 font-bold text-lg">3</div>
                    <div>
                        <h3 class="text-lg font-semibold">Go to Dashboard</h3>
                        <p class="text-gray-500 text-sm">
                            Access your personalized dashboard
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bottom Right Image -->
            <img
                src="https://via.placeholder.com/150"
                alt="Person pointing"
                class="absolute bottom-0 right-12 w-40 md:w-48"
            />
        </div>
    </div>
</div>
