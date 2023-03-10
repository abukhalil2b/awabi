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
        @include('layouts.admin_navigation')

     
        <div class="flex h-screen">
            <aside class="w-32 bg-slate-700 hidden sm:block">
                @include('layouts._admin_aside')
            </aside>
            <main class="p-2 w-full">
                {{ $slot }}
            </main>
        </div>

    </div>

    @livewireScripts
</body>

</html>