<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen bg-gray-100">
        <!-- distance -->
        @if(auth()->user()->app == 'distance_')
        @include('layouts.distance_navigation')
        @endif

        <!-- attendance -->
        @if(auth()->user()->app == 'attendance_')
        @include('layouts.attendance_navigation')
        @endif

        {{ $slot }}

    </div>

    @livewireScripts
</body>

</html>