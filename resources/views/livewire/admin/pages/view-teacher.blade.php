<div class="container">
    <div class="mb-8">
        <nav class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <a href="{{ route('admin.teacher') }}" 
               class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200 group">
                <svg class="w-4 h-4 mr-2 transition-transform duration-200 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Teachers List
            </a>
            <div class="flex items-center space-x-2 text-sm text-gray-500">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-900">Admin</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('admin.teacher') }}" class="hover:text-gray-900">Teachers</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-900 font-medium">Profile</span>
            </div>
        </nav>
    </div>

    <!-- Main Profile Card -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
        <!-- Enhanced Header Section -->
        <div class="relative">
            <!-- Improved Cover Image with Pattern -->
            <div class="h-48 bg-gradient-to-r from-teal-500 to-emerald-500 relative overflow-hidden">
                <div class="absolute inset-0 opacity-10">
                    <svg class="w-full h-full" viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
                        <pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse">
                            <path d="M 20 0 L 0 0 0 20" fill="none" stroke="white" stroke-width="1"/>
                        </pattern>
                        <rect width="100%" height="100%" fill="url(#grid)" />
                    </svg>
                </div>
            </div>
            
            <!-- Enhanced Profile Info Section -->
            <div class="px-8 pb-8">
                <!-- Improved Avatar -->
                <div class="relative -mt-20 mb-6 flex justify-center sm:justify-start">
                    <div class="relative">
                        @if($teacher->image)
                            <img class="h-40 w-40 rounded-2xl border-4 border-white shadow-lg object-cover" 
                                 src="{{ asset('storage/' . $teacher->image) }}" 
                                 alt="{{ $teacher->first_name }}">
                        @else
                            <div class="h-40 w-40 rounded-2xl border-4 border-white shadow-lg bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                <span class="text-5xl text-gray-500 font-medium">{{ substr($teacher->first_name, 0, 1) }}</span>
                            </div>
                        @endif
                        <div class="absolute -bottom-2 -right-2 h-8 w-8 rounded-lg border-4 border-white bg-green-400 shadow-lg"></div>
                    </div>
                </div>

                <!-- Enhanced Name and Basic Info -->
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">
                            {{ $teacher->first_name }} {{ $teacher->last_name }}
                        </h1>
                        <div class="flex flex-wrap items-center gap-4">
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="text-sm">{{ $teacher->email }}</span>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-medium bg-green-100 text-green-800">
                                <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>
                                Active Teacher
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Information Cards -->
        <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Personal Information Card -->
            <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-md transition-all duration-300">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center">
                    <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900">Personal Information</h3>
                </div>
                <div class="p-6 space-y-4 bg-white">
                    @foreach(['phone' => 'Phone', 'gender' => 'Gender', 'age' => 'Age'] as $key => $label)
                        <div class="flex items-center">
                            <div class="w-1/3">
                                <span class="text-sm font-medium text-gray-500">{{ $label }}</span>
                            </div>
                            <div class="w-2/3">
                                <span class="text-sm text-gray-900">{{ $teacher->$key ?? 'Not provided' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Additional Information Card -->
            <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-md transition-all duration-300">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center">
                    <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900">Additional Information</h3>
                </div>
                <div class="p-6 space-y-4 bg-white">
                    @foreach(['religion' => 'Religion', 'language' => 'Language', 'marital_status' => 'Marital Status'] as $key => $label)
                        <div class="flex items-center">
                            <div class="w-1/3">
                                <span class="text-sm font-medium text-gray-500">{{ $label }}</span>
                            </div>
                            <div class="w-2/3">
                                <span class="text-sm text-gray-900">{{ $teacher->$key ?? 'Not provided' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Enhanced Biography Section -->
        @if($teacher->bio)
            <div class="px-8 pb-8">
                <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-md transition-all duration-300">
                    <div class="px-6 py-4 border-b border-gray-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Biography</h3>
                    </div>
                    <div class="p-6 bg-white">
                        <p class="text-gray-700 leading-relaxed">{{ $teacher->bio }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
