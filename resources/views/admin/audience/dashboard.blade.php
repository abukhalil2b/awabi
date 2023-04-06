@extends('layouts.attendance')

@section('content')
<div x-data="audienceSelectNumbers" x-init="audiences = {{ $audiences }}">
    <div class="p-5 w-full flex justify-center text-white">
        <a href="{{ route('admin.audience.index') }}">
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

</div>


@endsection