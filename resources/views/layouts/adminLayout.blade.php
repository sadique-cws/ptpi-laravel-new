<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>

<body class="bg-gray-50" x-data="{ sidebarOpen: window.innerWidth > 640 }">
    <!-- Header -->
    <livewire:admin.header />

    <!-- Sidebar Backdrop (mobile) -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" 
         class="fixed inset-0 z-20 bg-black bg-opacity-50 sm:hidden" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
    </div>

    <!-- Sidebar -->
    <livewire:admin.sidebar />

    <!-- Main Content -->
    <main class="pt-16 sm:ml-64 transition-all duration-300 ease-in-out">
        <div class="px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    @livewireScripts
    <script>
        // Close sidebar when clicking on mobile
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                sidebarOpen = false;
            }
        });

        // Responsive sidebar behavior
        window.addEventListener('resize', function() {
            if (window.innerWidth > 640) {
                sidebarOpen = true;
            }
        });
    </script>
</body>
</html>