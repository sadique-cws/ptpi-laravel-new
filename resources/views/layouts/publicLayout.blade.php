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

    <nav class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center"><button
                        class="md:hidden p-2 text-gray-600 hover:text-teal-600 transition-colors"><svg
                            stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                            stroke-linecap="round" stroke-linejoin="round" height="24" width="24"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg></button><a class="text-xl font-bold text-gray-800" href="/">PTP <span
                            class="text-teal-600">INSTITUTE</span></a></div>
                <div class="md:hidden"><button
                        class="group relative overflow-hidden bg-gradient-to-r from-teal-500 via-teal-600 to-teal-500 bg-[length:200%_auto] transition-all
        duration-500 hover:bg-right-bottom hover:shadow-2xl px-3 py-2 rounded-xl font-semibold text-white
        hover:-translate-y-0.5 transform shadow-lg hover:shadow-teal-500/30"><span
                            class="relative flex items-center justify-center gap-2"><svg stroke="currentColor"
                                fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                stroke-linejoin="round" class="w-4 h-4 transition-transform group-hover:rotate-12"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg><span
                                class="bg-gradient-to-r from-white/90 to-white bg-clip-text text-transparent relative animate-pulse">शिक्षक
                                खोजें</span></span>
                        <div class="absolute inset-0">
                            <div
                                class="absolute inset-0 translate-x-full animate-[shine_3s_ease-in-out_infinite] bg-gradient-to-r from-transparent via-white/30 to-transparent">
                            </div>
                        </div>
                        <div
                            class="absolute inset-0 rounded-xl border-2 border-white/30 transition-all duration-500 group-hover:border-white/50 group-hover:scale-[0.98]">
                        </div>
                        <div
                            class="absolute -inset-1 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-teal-500/20 blur group-hover:animate-pulse -z-10">
                        </div>
                        <div
                            class="absolute inset-0 rounded-xl group-hover:animate-[ripple_1s_ease-in-out_infinite] bg-gradient-to-r from-teal-400/0 via-teal-400/30 to-teal-400/0 opacity-0 group-hover:opacity-100">
                        </div>
                    </button></div>
                <div class="hidden md:flex items-center space-x-3"><button
                        class="group relative overflow-hidden bg-gradient-to-r from-teal-500 via-teal-600 to-teal-500 bg-[length:200%_auto] transition-all
        duration-500 hover:bg-right-bottom hover:shadow-2xl px-6 py-3 rounded-xl font-semibold text-white
        hover:-translate-y-0.5 transform shadow-lg hover:shadow-teal-500/30"><span
                            class="relative flex items-center justify-center gap-2"><svg stroke="currentColor"
                                fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                stroke-linejoin="round" class="w-5 h-5 transition-transform group-hover:rotate-12"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg><span
                                class="bg-gradient-to-r from-white/90 to-white bg-clip-text text-transparent relative animate-pulse">शिक्षक
                                खोजें</span></span>
                        <div class="absolute inset-0">
                            <div
                                class="absolute inset-0 translate-x-full animate-[shine_3s_ease-in-out_infinite] bg-gradient-to-r from-transparent via-white/30 to-transparent">
                            </div>
                        </div>
                        <div
                            class="absolute inset-0 rounded-xl border-2 border-white/30 transition-all duration-500 group-hover:border-white/50 group-hover:scale-[0.98]">
                        </div>
                        <div
                            class="absolute -inset-1 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-teal-500/20 blur group-hover:animate-pulse -z-10">
                        </div>
                        <div
                            class="absolute inset-0 rounded-xl group-hover:animate-[ripple_1s_ease-in-out_infinite] bg-gradient-to-r from-teal-400/0 via-teal-400/30 to-teal-400/0 opacity-0 group-hover:opacity-100">
                        </div>
                    </button>
                    <div class="flex gap-2"><a
                            class="flex items-center gap-2 px-3 py-2.5 font-medium text-teal-600 transition-all duration-300 border-2 border-teal-500 rounded-lg hover:bg-purple-50 hover:shadow-md"
                            href="{{route('public.login')}}"><svg stroke="currentColor" fill="none" stroke-width="2"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg><span>Login</span></a><a
                            class="flex items-center gap-2 px-3 py-2.5 font-medium text-teal-600 transition-all duration-300 border-2 border-teal-500 rounded-lg hover:bg-purple-50 hover:shadow-md"
                            href="{{ route('public.teacher.signup') }}"><svg stroke="currentColor" fill="none" stroke-width="2"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg><span>Register as a Teacher</span></a><a
                            class="flex items-center gap-2 px-3 py-2.5 font-medium text-teal-600 transition-all duration-300 border-2 border-teal-500 rounded-lg hover:bg-blue-50 hover:shadow-md"
                            href="{{route('public.recruiter.signup')}}"><svg stroke="currentColor" fill="none" stroke-width="2"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg><span>Recruiter Sign Up</span></a></div>
                </div>
            </div>
        </div>
        <div
            class="md:hidden fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform transition-transform
-translate-x-full">
            <div class="p-4 border-b">
                <div class="flex items-center justify-between"><span class="text-lg font-bold text-gray-800">PTP <span
                            class="text-teal-600">INSTITUTE</span></span><button
                        class="p-2 text-gray-600 hover:text-teal-600"><svg stroke="currentColor" fill="none"
                            stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                            height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button></div>
            </div>
            <div class="p-4 space-y-4">
                <div class="space-y-3"><a
                        class="flex items-center gap-2 w-full px-4 py-2.5 font-medium text-teal-600 transition-all duration-300 border-2 border-teal-500 rounded-lg hover:bg-purple-50 hover:shadow-md justify-center"
                        href="/signin"><svg stroke="currentColor" fill="none" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"
                            height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg><span>Login</span></a><a
                        class="flex items-center gap-2 w-full px-4 py-2.5 font-medium text-teal-600 transition-all duration-300 border-2 border-teal-500 rounded-lg hover:bg-purple-50 hover:shadow-md justify-center"
                        href="/signup/teacher"><svg stroke="currentColor" fill="none" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"
                            height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <line x1="20" y1="8" x2="20" y2="14"></line>
                            <line x1="23" y1="11" x2="17" y2="11"></line>
                        </svg><span>Register as a Teacher</span></a><a
                        class="flex items-center gap-2 w-full px-4 py-2.5 font-medium text-teal-600 transition-all duration-300 border-2 border-teal-500 rounded-lg hover:bg-blue-50 hover:shadow-md justify-center"
                        href="/signup/recruiter"><svg stroke="currentColor" fill="none" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"
                            height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <line x1="20" y1="8" x2="20" y2="14"></line>
                            <line x1="23" y1="11" x2="17" y2="11"></line>
                        </svg><span>Recruiter Sign Up</span></a></div>
            </div>
        </div>
        <div>
            <style>
                .animate-fade-in {
                    animation: fadeIn 0.3s ease-in;
                }

                .animate-slide-in {
                    animation: slideIn 0.3s ease-out;
                }

                @keyframes fadeIn {
                    from {
                        opacity: 0;
                    }

                    to {
                        opacity: 1;
                    }
                }

                @keyframes slideIn {
                    from {
                        transform: translateX(20px);
                        opacity: 0;
                    }

                    to {
                        transform: translateX(0);
                        opacity: 1;
                    }
                }

                .btn-primary {
                    @apply bg-teal-600 text-white px-6 py-2.5 rounded-lg hover:bg-teal-700 transition-colors flex items-center;
                }

                .btn-secondary {
                    @apply text-gray-600 hover:text-gray-800 transition-colors flex items-center;
                }
            </style>
        </div>
        <style>
            @keyframes shine {
                from {
                    transform: translateX(-100%);
                }

                50% {
                    transform: translateX(100%);
                }

                to {
                    transform: translateX(100%);
                }
            }

            @keyframes ripple {
                from {
                    transform: scale(1);
                    opacity: 1;
                }

                to {
                    transform: scale(1.05);
                    opacity: 0;
                }
            }
        </style>
    </nav>
    {{ $slot }}


    <footer class="bg-gray-100 py-8">
        <div class="container mx-auto grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-8 px-5">
            <div class="px-2">
                <h3 class="font-bold text-lg mb-4 text-gray-800">Tutors</h3>
                <ul class="space-y-2 text-gray-600">
                    <li><a class="hover:underline block" href="/">Home</a></li>
                    <li><a class="hover:underline block" href="/login">Log in</a></li>
                    <li><a class="hover:underline block" href="/signup/recruiter">Recruiter SignUp</a></li>
                    <li><a class="hover:underline block" href="/about">About</a></li>
                    <li><a class="hover:underline block" href="/teacher">Teacher Dashboard</a></li>
                    <li><a class="hover:underline block" href="/examcenter">Exam Center</a></li>
                    <li><a class="hover:underline block" href="/subject-expert">Subject Expert</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-4 text-gray-800">Top Services</h3>
                <ul class="space-y-2 text-gray-600">
                    <li><a class="hover:underline block" href="/math-tutors">Math Tutors</a></li>
                    <li><a class="hover:underline block" href="/reading-tutors">Reading Tutors</a></li>
                    <li><a class="hover:underline block" href="/english-tutors">English Tutors</a></li>
                    <li><a class="hover:underline block" href="/sat-tutoring">SAT Tutoring</a></li>
                    <li><a class="hover:underline block" href="/chemistry-tutors">Chemistry Tutors</a></li>
                    <li><a class="hover:underline block" href="/spanish-tutors">Spanish Tutors</a></li>
                </ul>
            </div>
            <div class="p-2">
                <h3 class="font-bold text-lg mb-4 text-gray-800">Students</h3>
                <ul class="space-y-2 text-gray-600">
                    <li><a class="hover:underline block" href="/hiring-tips">Tips for hiring</a></li>
                    <li><a class="hover:underline block" href="/pricing">Tutoring prices</a></li>
                    <li><a class="hover:underline block" href="/free-courses">Free online courses</a></li>
                    <li><a class="hover:underline block" href="/online-tutoring">Online tutoring</a></li>
                    <li><a class="hover:underline block" href="/local-services">Services near me</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-lg mb-4 text-gray-800">Tutors Jobs</h3>
                <ul class="space-y-2 text-gray-600">
                    <li><a class="hover:underline block" href="/tutoring-jobs">Tutoring jobs</a></li>
                    <li><a class="hover:underline block" href="/online-jobs">Online tutoring jobs</a></li>
                    <li><a class="hover:underline block" href="/become-tutor">How to become a tutor</a></li>
                    <li><a class="hover:underline block" href="/whiteboard">Online whiteboard for teaching</a></li>
                    <li><a class="hover:underline block" href="/reviews">PTPI.com reviews</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center text-gray-500 mt-8 text-sm border-t pt-4 px-4">
            <p>© 2024 copyright ·<a class="hover:underline mx-2" href="/terms">Terms of Use</a> ·<a
                    class="hover:underline mx-2" href="/privacy">Privacy Policy</a> ·<a class="hover:underline mx-2"
                    href="/accessibility">Accessibility</a> ·<a class="hover:underline mx-2"
                    href="/services">Services</a></p>
        </div>
    </footer>
</body>

</html>
