@extends('layouts.attendance')

@section('content')


<div class="text-white font-bold flex items-center justify-center text-2xl p-5">
    <div>{{ $roundplay->title }}</div>
</div>

<div class="text-white font-bold flex items-center justify-between text-4xl pt-5 px-20">
    <div class="w-96 text-right">الفريق</div>
    <th class="w-96 text-left">النقطة</th>
</div>

<div x-data="{ showUpdateButton:false }">

    @foreach($roundplayUsers as $roundplayResult)
    <div class="text-white font-bold flex items-center justify-between text-5xl pt-5 px-20">
        <div class="w-96 text-right">
            {{ $roundplayResult->name }}
        </div>
        <div class="w-96 text-left">
            {{ $roundplayResult->pivot->mark }}
        </div>

        <div x-cloak x-show="showUpdateButton">
            <livewire:admin.attendance.roundplay.update-result :roundplayId="$roundplayResult->pivot->roundplay_id" :userId="$roundplayResult->pivot->user_id" :key="$roundplayResult->id" />
        </div>

    </div>
    <div class="border-b border-gray-400 mt-5"></div>
    @endforeach

    <div class="mt-5 w-full flex justify-center">
        <div class="text-white cursor-pointer text-xs" @click="showUpdateButton = true">
            تعديل النتيجة يدويا
        </div>
    </div>
</div>

@endsection