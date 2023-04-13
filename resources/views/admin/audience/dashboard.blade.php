@extends('layouts.attendance')

@section('content')
<div x-data="audienceSelectNumbers" x-init="audiences = {{ $audiences }}">
    <div class="p-5 w-full flex justify-center text-white">
        <a href="{{ route('admin.audience.index') }}" class="border border-white p-1 rounded hover:opacity-70">
            عدد الداخلين في السحب {{ count($audiences) }}
        </a>
    </div>


    <div class="p-5 w-full flex flex-col gap-1 justify-center items-center">
        <x-secondary-button @click="withdraw">
            سحب رقم
        </x-secondary-button>
        <progress id="file" x-model="progress" max="50" class="text-white"></progress>
    </div>



    <div class="mt-10 p-5 w-full flex justify-center">

        <template x-if="selected">
            <div x-text="selected.phone" @click="storeSelectAudience(selected.phone)" class="w-44 text-white text-center text-4xl border rounded p-1 hover:cursor-pointer"></div>
        </template>

    </div>

    <div class="mt-10 p-5 w-full flex justify-center">

        <div x-cloak x-show="selectedPhone != '' ">
            <form action="{{ route('audience.store.selected') }}" method="POST">
                @csrf
                <input name="phone" type="hidden" x-model="selectedPhone" class="text-red-800">
                <x-secondary-button class="text-red-800" type="submit">
                    حفظ الرقم
                </x-secondary-button>
            </form>
        </div>

    </div>


    <div x-data="audienceSelectNumberForChildren" class="h-52 mt-3 p-5 w-full flex flex-col items-center justify-around">

        <div class="text-center flex items-center" x-cloak x-show="numbers.length == 0">
            <div>
                <div class="text-white"> حدد عدد الداخلين في السحب </div>
                <input type="number" x-model="toNum" class="w-32 text-center">
            </div>
            <x-primary-button class="self-end" @click="generateNumbers">
                حفظ
            </x-primary-button>
        </div>



        <x-primary-button x-cloak x-show="numbers.length != 0" @click="withdraw" class="h-10">
            سحب رقم
        </x-primary-button>



        <div class="mt-5">
            <div x-text="winnerNumber" class="text-white text-6xl"></div>
        </div>

        <div class="mt-5 text-gray-500" x-text="JSON.stringify(prevWinners)"></div>

        <div x-cloak x-show="numbers.length != 0" class="mt-10">
            <div @click="showEraseButton = true" x-cloak x-show=" ! showEraseButton" class="h-8 text-red-500 cursor-pointer">
                مسح كل الأرقام
            </div>

            <div x-cloak x-show="showEraseButton">
                <x-danger-button @click="erase">
                    تأكيد المسح
                </x-danger-button>
            </div>
        </div>

    </div>

</div>


@endsection