<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recruiter</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="h-full">
    <div>
        <!-- Mobile sidebar backdrop -->
        @if($showMobileMenu ?? false)
            <div 
                class="fixed inset-0 z-40 bg-gray-900/50 lg:hidden"
                wire:click="$set('showMobileMenu', false)"
            ></div>
        @endif

        <!-- Mobile sidebar -->
        <div class="lg:hidden">
            <div class="fixed inset-y-0 left-0 z-50 w-72 bg-white transform transition-transform duration-300 ease-in-out {{ $showMobileMenu ?? false ? 'translate-x-0' : '-translate-x-full' }}">
                <livewire:recruiter.components.sidebar />
            </div>
        </div>

        <!-- Desktop sidebar -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:left-0 lg:z-50 lg:block lg:w-72 lg:overflow-y-auto lg:bg-white lg:border-r lg:border-gray-200">
            <livewire:recruiter.components.sidebar />
        </div>

        <!-- Main content -->
        <div class="lg:pl-72">
            <livewire:recruiter.components.header />

            <main class="py-6">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

</body>

</html>