@extends('layouts.attendance')

@section('content')

<div class="p-3">
    <div class="flex justify-center text-2xl">
        {{ $cate->title }}
    </div>
    <div class="grid grid-cols-10 gap-2">
        @foreach($questions as $key => $question)

        <x-attendance-question-card :question="$question">
            {{$key + 1}}
        </x-attendance-question-card>

        @endforeach
    </div>

</div>

@endsection