<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>مسابقة المثقف الأول </title>

    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @media print {
            .print_hidden {
                display: none !important;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-gray-100">

    @include('layouts.admin_navigation')

    <div class="flex h-screen">
        <aside class="w-32 bg-slate-700 sm:block hidden print_hidden">
            @include('layouts._admin_aside')
        </aside>
        <main class="p-2 w-full overflow-scroll">
            {{ $slot }}
        </main>
    </div>
    <footer class="my-6 py-6 text-center">All @copyright Reserved</footer>

    @livewireScripts
</body>

</html>