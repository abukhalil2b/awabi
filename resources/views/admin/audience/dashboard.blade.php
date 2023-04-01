@extends('layouts.audience')

@section('content')
<div x-data="audienceSelectNumbers" x-init="audiences = {{ $audiences }}">
    <div class="p-5 w-full flex justify-center">
        عدد الداخلين في السحب {{ count($audiences) }}
    </div>


    <div class="p-5 w-full flex gap-1 justify-center">
        <x-secondary-button @click="withdraw">
            سحب رقم
        </x-secondary-button>
    </div>


    <div class="mt-10 p-5 w-full flex justify-center">

        <template x-if="selected">
            <div x-text="selected.phone" @click="storeSelectAudience(selected.phone)" class="w-44 text-center text-4xl hover:border rounded p-1 hover:cursor-pointer"></div>
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