<div class="">
    <!-- Page header -->
    <div class=" mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Available Teachers</h1>
        <p class="mt-2 text-sm text-gray-600">Find the perfect teacher for your needs</p>
    </div>

    <!-- Teachers grid -->
    <div class="">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
            @forelse($teachers as $teacher)
                <div class="group relative bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden">
                    <!-- Teacher Header Section -->
                    <div class="relative h-48 bg-gradient-to-br from-teal-600 to-teal-700">
                        <!-- Profile Image/Avatar -->
                        <div class="absolute -bottom-10 left-6">
                            <div class="relative">
                                @if($teacher->image)
                                    <img src="{{ asset($teacher->image) }}" 
                                         alt="{{ $teacher->first_name }}" 
                                         class="w-20 h-20 rounded-xl object-cover border-4 border-white shadow-sm">
                                @else
                                    <div class="w-20 h-20 rounded-xl bg-white shadow-sm border-4 border-white flex items-center justify-center">
                                        <span class="text-2xl font-bold text-teal-600">
                                            {{ strtoupper(substr($teacher->first_name, 0, 1)) }}
                                        </span>
                                    </div>
                                @endif
                                @if($teacher->is_verified)
                                    <div class="absolute -right-1 -bottom-1">
                                        <div class="bg-green-100 p-1 rounded-full border-2 border-white">
                                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Teacher Info Section -->
                    <div class="px-6 pt-12 pb-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 group-hover:text-teal-600 transition-colors">
                                    {{ $teacher->first_name }} {{ $teacher->last_name }}
                                </h3>
                                <p class="text-sm text-gray-500 mt-1">{{ $teacher->email }}</p>
                            </div>
                            <button class="text-gray-400 hover:text-red-500 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Stats Grid -->
                        <div class="grid grid-cols-2 gap-4 py-4 border-y border-gray-100">
                            <div class="text-center">
                                <span class="block text-2xl font-bold text-teal-600">{{ $teacher->experience ?? 0 }}</span>
                                <span class="text-xs text-gray-500 uppercase tracking-wide">Years Exp.</span>
                            </div>
                            <div class="text-center">
                                <span class="block text-2xl font-bold text-teal-600">
                                    {{ $teacher->subjects ? $teacher->subjects->count() : 0 }}
                                </span>
                                <span class="text-xs text-gray-500 uppercase tracking-wide">Subjects</span>
                            </div>
                        </div>

                        <!-- Details List -->
                        <div class="mt-4 space-y-2">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                {{ $teacher->city ?? 'Location' }} ({{ $teacher->pincode }})
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                {{ $teacher->qualification }}
                            </div>
                        </div>

                        <!-- Subject Tags -->
                        <div class="mt-4 flex flex-wrap gap-2">
                            @forelse($teacher->subjects ?? [] as $subject)
                                <span class="px-2.5 py-1 text-xs font-medium bg-teal-50 text-teal-700 rounded-full border border-teal-100">
                                    {{ $subject->name }}
                                </span>
                            @empty
                                <span class="text-sm text-gray-500">No subjects assigned</span>
                            @endforelse
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <div class="grid grid-cols-2 gap-3">
                            <button class="inline-flex justify-center items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-teal-600 hover:bg-teal-700 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                View Profile
                            </button>
                            <button class="inline-flex justify-center items-center px-4 py-2.5 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                Contact
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <!-- No Results State -->
                <div class="col-span-full">
                    <div class="text-center py-12 bg-white rounded-xl border border-gray-200">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No teachers found</h3>
                        <p class="mt-1 text-sm text-gray-500">Try adjusting your search filters</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $teachers->links() }}
        </div>
    </div>
</div>
