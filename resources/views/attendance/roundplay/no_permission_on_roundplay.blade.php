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
            <div class="py-5 flex flex-col justify-center">
                <div>
                    <span class="text-blue-800 font-bold">الاسم</span>
                    <span class="text-red-800 font-bold">{{ $user->name }}</span>
                </div>
                <div>
                    <span class="text-blue-800 font-bold">المستخدم</span>
                    <span class="text-red-800 font-bold">{{ $user->phone }}</span>
                </div>
                <div>
                    <span class="text-blue-800 font-bold">كلمة المرور</span>
                    <span class="text-red-800 font-bold">{{ $user->plain_password }}</span>
                </div>
            </div>
            <div class="flex justify-center items-center text-2xl">
                لا توجد عندك صلاحيات
            </div>
            <div class="flex gap-5">
                <form class="flex justify-center" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <x-danger-button class="w-32">
                        تسجيل الخروج
                    </x-danger-button>
                </form>
                <button class="w-32 bg-blue-900 text-white h-10 rounded" onclick="location.reload()">
                    تحديث الحالة
                </button>
            </div>
        </div>
    </div>
</body>

</html>