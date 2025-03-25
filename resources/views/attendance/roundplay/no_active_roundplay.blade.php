<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>مسابقة المثقف الأول</title>

    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen bg-gray-100 flex justify-center items-center">
        <div>
            <div class="flex justify-center items-center text-2xl">
                لا توجد جولة مفعلة
            </div>
            <form class="mt-5 flex justify-center" action="{{ route('logout') }}" method="POST">
                @csrf
                <x-danger-button>
                    تسجيل الخروج
                </x-danger-button>
            </form>
        </div>
    </div>
</body>

</html>