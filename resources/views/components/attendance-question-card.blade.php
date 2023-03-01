@props(['question'=> null  ])

@php

if($question->status == 'ready'){
$classes = 'border-blue-900 text-blue-900 bg-blue-200';

$href = route('attendance.question.show',$question->id);
}

if($question->status == 'open'){
$classes = 'border-red-400 text-red-400 bg-red-100';

$href = route('attendance.question.show',$question->id);
}

if($question->status == 'close'){
$classes = 'border-gray-300 text-gray-300 bg-gray-100';

$href = route('attendance.question.answer.index',$question->id);
}

@endphp

<a class="w-28 h-28 text-6xl rounded-full border-4 flex justify-center items-center {{ $classes }}" href="{{ $href }}">
    {{$slot}}
</a>
<!-- SELECT * FROM `questions` WHERE `status` = 'open' -->