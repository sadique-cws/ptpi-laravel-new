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
<div class="bg-teal-600 text-white py-4 px-8 text-xl font-bold">
    PTP INSTITUTE
</div>
    {{ $slot }}

    @livewireScripts
</body>
</html>
