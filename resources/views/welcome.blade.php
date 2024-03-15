<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title> مسابقة المثقف الأول </title>
</head>

<body>

    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 ">

        <img src="{{ asset('logo.png') }}" alt="logo" width="100" class="-rotate-90 rounded-sm">
        <div class="mt-10">
            مسابقة المثقف الأول

        </div>
        
        @if (Route::has('login'))
        <div>
            @auth()
            <div class="flex flex-col text-xs sm:flex-row sm:text-sm">
                <a href="{{ route('attendance_dashboard') }}" class="bg-white text-center w-52 p-5 rounded m-3 shadow hover:opacity-70">
                    الجماهيرية
                </a>
               
                <a href="{{ route('distance_dashboard') }}" class="bg-white text-center w-52 p-5 rounded m-3 shadow hover:opacity-70">
                    عن بعد
                </a>
            </div>
            <form class="mt-5 flex justify-center" action="{{ route('logout') }}" method="POST">
                @csrf
                <x-danger-button>
                    تسجيل الخروج
                </x-danger-button>
            </form>

            @else
            <div class="flex flex-col sm:flex-row">

                <a class="bg-white text-center w-52 p-5 rounded m-3 shadow hover:opacity-70" href="{{ route('login') }}">
                    تسجيل الدخول
                </a>
            </div>
            @endauth
        </div>
        @endif

    </div>

</body>

</html>