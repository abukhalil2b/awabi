@extends('layouts.attendance')

@section('content')


    <div class="text-blue-800 flex items-center justify-center text-2xl p-5">
        <div>{{ $roundplay->title }}</div>
    </div>

    <div class="text-blue-800 flex items-center justify-between text-4xl pt-5 px-20">
        <div class="w-96 text-right">الفريق</div>
        <th class="w-96 text-left">النقطة</th>
    </div>

    @foreach($roundplay->users as $roundplayResult)
    <div class="text-blue-800 flex items-center justify-between text-5xl pt-5 px-20">
        <div class="w-96 text-right">
            {{ $roundplayResult->name }}
        </div>
        <div class="w-96 text-left">
            {{ $roundplayResult->pivot->mark }}
        </div>
    </div>
    <div class="border-b border-gray-400 mt-5"></div>
    @endforeach


@endsection