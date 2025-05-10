<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles


</head>

<body>

    <!-- Header -->
    <header class="bg-white border-b border-gray-200">
        <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Top">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo Section -->
                <div class="flex items-center">
                    <a href="{{ route('public.homepage') }}" class="flex items-center space-x-3">
                        <span class="text-2xl font-bold text-teal-600">PTP</span>
                        <span class="text-lg font-semibold text-gray-900">INSTITUTE</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('public.homepage') }}"
                        class="text-sm font-medium text-gray-700 hover:text-teal-600 transition-colors">
                        Home
                    </a>
                </div>
            </div>
        </nav>
    </header>
    {{ $slot }}

</body>

</html>
