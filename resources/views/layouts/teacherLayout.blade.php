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
    <div class="w-full flex">
        <div class="">
            <livewire:teacher.components.sidebar />
        </div>
        <div class="flex flex-col w-full min-h-screen bg-gray-100">
            <livewire:teacher.component.header/>
           <div class="ml-72 p-2">
            {{ $slot}}
           </div>
        </div>
    </div>

</body>

</html>
