<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    <div class="app">
        @yield('content')
    </div>
    {{-- Flowbite Script --}}
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
    {{-- Livewire Script --}}
    @livewireScripts
</body>
</html>