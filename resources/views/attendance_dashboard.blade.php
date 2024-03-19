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
    <div class="min-h-screen bg-gray-100">
       

        <div class="py-3 px-5 bg-white flex justify-between items-center">
            <div>
                {{ Auth::user()->name }}
            </div>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-red-600">
                    تسجيل الخروج
                </x-dropdown-link>
            </form>
        </div>


        @if( isset( $question ) )
        <!-- if question is open => show question -->

        <div class="bg-blue-900 text-white w-full p-3 font-bold">
            {{ $question->content }}
        </div>

        <div>
            @if( isset( $answer ) )

            <div class="bg-white mt-3 p-3 w-full font-bold border">
                <div> إجابتك:</div>
                <div class="flex">
                    <div>
                        {{ $answer->ans }}
                    </div>
                    <div>
                        {{ $question[$answer->ans] }}
                    </div>
                </div>
            </div>

            <div class="w-full fixed bottom-0">
                <button class="w-full bg-blue-900 text-white h-20 rounded-none" onclick="location.reload()">
                    اذهب للسؤال
                </button>
            </div>

            @else
            <div class="p-3">

                <livewire:attendance.send-answer :question="$question" :user_id="auth()->id()" :roundplay_id="$roundplay->id" />

            </div>

            @endif
        </div>
        @else
        <div class="w-full fixed bottom-0">
            <button class="w-full bg-blue-900 text-white h-20 rounded-none" onclick="location.reload()">
                اذهب للسؤال
            </button>
        </div>
        @endif

    </div>
    @livewireScripts
</body>

</html>