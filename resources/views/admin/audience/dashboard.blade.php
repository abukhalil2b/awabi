@extends('layouts.attendance')

@section('content')
<div x-data="audienceSelectNumbers" x-init="audiences = {{ $audiences }}" class="h-96 border">


    <div class="p-3 w-full flex justify-center text-white">
        <a href="{{ route('admin.audience.index') }}" class="border border-white p-1 rounded hover:opacity-70">
            عدد الداخلين في السحب {{ count($audiences) }}
        </a>
    </div>

    <div class="p-3 w-full flex flex-col gap-1 justify-center items-center">
        <x-secondary-button @click="withdraw">
            سحب اسم
        </x-secondary-button>
        <progress x-model="progress" max="50" class=""></progress>
    </div>

    <div class=" p-5 w-full flex justify-center">

        <template x-if="selected">
            <div>
                <div x-text="selected.name" @click="storeSelectAudience(selected.id)" class="w-[400px] text-white text-center text-2xl border rounded p-1 hover:cursor-pointer"></div>
            </div>
        </template>

    </div>

    <div class="mt-3 p-5 w-full flex justify-center">

        <div x-cloak x-show="selectAudienceId != 0 ">
            <form action="{{ route('audience.store.selected') }}" method="POST" class="">
                @csrf
                <input name="audienceId" type="hidden" x-model="selectAudienceId" class="text-red-800">
                <x-secondary-button class="text-red-800" type="submit">
                  إزالة الرقم من قائمة السحب
                </x-secondary-button>
            </form>
        </div>

    </div>
</div>

<div x-data="audienceSelectNumberForChildren" class=" mt-3 p-5 w-full flex flex-col items-center justify-around border">

    <div class="text-center flex items-center" x-cloak x-show="numbers.length == 0">
        <div>
            <div class="text-white"> حدد عدد الداخلين في السحب </div>
            <input type="number" x-model="toNum" class="w-20 text-center">
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




@endsection