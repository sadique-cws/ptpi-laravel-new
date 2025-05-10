<div class="container">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Welcome back, {{ auth()->user()->first_name }}!</h1>
        <p class="mt-1 text-sm text-gray-500">Here's what's happening in your school today.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

        <!-- Teachers Card -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Teachers</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['teachers'] }}</h3>
                    </div>
                    <div class="p-3 bg-green-50 rounded-lg">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Card -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Class Categories</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['categories'] }}</h3>
                    </div>
                    <div class="p-3 bg-purple-50 rounded-lg">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subjects Card -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Subjects</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['subjects'] }}</h3>
                    </div>
                    <div class="p-3 bg-yellow-50 rounded-lg">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Exams Card -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Exams</p>
                        <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['exams'] }}</h3>
                    </div>
                    <div class="p-3 bg-indigo-50 rounded-lg">
                        <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm">
                    <span class="text-green-500 font-medium">{{ $stats['activeExams'] }} active</span>
                    <span class="mx-2 text-gray-300">•</span>
                    <span class="text-gray-600">{{ $stats['exams'] - $stats['activeExams'] }} drafts</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Teachers -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">Recent Teachers</h3>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach($recentTeachers as $teacher)
                    <div class="p-6 flex items-center justify-between hover:bg-gray-50">
                        <div class="flex items-center">
                            @if($teacher->image)
                                <img src="{{ asset('storage/' . $teacher->image) }}" alt="{{ $teacher->first_name }}" 
                                     class="w-10 h-10 rounded-full object-cover">
                            @else
                                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">
                                    <span class="text-gray-600 font-medium">{{ substr($teacher->first_name, 0, 1) }}</span>
                                </div>
                            @endif
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-900">
                                    {{ $teacher->first_name }} {{ $teacher->last_name }}
                                </h4>
                                <p class="text-sm text-gray-500">{{ $teacher->email }}</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.teacher.view', $teacher->id) }}" 
                           class="text-sm text-indigo-600 hover:text-indigo-900">View profile</a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Exams -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">Recent Exams</h3>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach($recentExams as $exam)
                    <div class="p-6 flex items-center justify-between hover:bg-gray-50">
                        <div>
                            <h4 class="text-sm font-medium text-gray-900">{{ $exam->name }}</h4>
                            <p class="text-sm text-gray-500">{{ $exam->category->cat_title }}</p>
                        </div>
                        <div class="flex items-center">
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full 
                                {{ $exam->status === 'published' ? 'bg-green-100 text-green-800' : 
                                   ($exam->status === 'draft' ? 'bg-gray-100 text-gray-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($exam->status) }}
                            </span>
                            <a href="{{ route('admin.exam.questions', $exam->id) }}" 
                               class="ml-4 text-sm text-indigo-600 hover:text-indigo-900">View questions</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
