<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @php
    use Illuminate\Support\Facades\DB;

    $userByStates = DB::table('users')
    ->select(DB::raw('count(state_id) as stateCount'),'states.name as stateName')
    ->join('states','users.state_id','=','states.id')
    ->groupby('state_id')
    ->orderby('stateCount','DESC')
    ->get();
    $activeUserCount = DB::table('users')->where('state_id','<>',NULL)
        ->where('app','distance')
        ->count();
        $notActiveUserCount = DB::table('users')->where('state_id',NULL)
        ->where('app','distance')
        ->count();
        $totalUserCount = $activeUserCount + $notActiveUserCount;
        @endphp
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>

            <div  x-data="{ show:false }">
               <div @click=" show = true " class="mt-5 w-32 border rounded p-1 text-center cursor-pointer hover:bg-white">
               إحصائيات
               </div>

                <div class="flex justify-center text-xs">

                    <div x-cloak x-show="show">
                        <div class="mt-1 flex justify-between gap-5 border-b">
                            <div class="text-red-800 font-bold">المشاركين المتفاعلين</div>
                            <div> {{ $activeUserCount }}</div>
                        </div>
                        <div class="mt-1 flex justify-between gap-5 border-b">
                            <div class="text-red-800 font-bold"> المشاركين الغير متفاعلين</div>
                            <div> {{ $notActiveUserCount }}</div>
                        </div>
                        <div class="mt-1 flex justify-between gap-5 border-b">
                            <div class="text-red-800 font-bold"> مجموع المشاركين</div>
                            <div> {{ $totalUserCount }}</div>
                        </div>

                        <hr class="mt-5">

                        <div class="flex justify-between gap-5 border-b">
                            <div class="text-red-800 font-bold"> الولاية </div>
                            <div class="text-red-800 font-bold"> عدد المشاركين </div>
                        </div>

                        <div class=" h-72 overflow-scroll">
                       
                        @foreach($userByStates as $userByStates)

                        <div class="mt-1 flex justify-between gap-5 border-b">
                            <div>
                                {{ $userByStates->stateName }}
                            </div>
                            <div>
                                {{ $userByStates->stateCount }}
                            </div>
                        </div>

                        @endforeach
                        </div>

                    </div>
                </div>
            </div>

        </div>
</body>

</html>