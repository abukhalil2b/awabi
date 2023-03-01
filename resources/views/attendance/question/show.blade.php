@extends('layouts.attendance')

@section('content')


@if($question->status == 'open')

<x-question-content>
    {{$question->content}}
</x-question-content>
<div class="p-3">
    <x-question-option letter="A">
        {{$question->A}}
    </x-question-option>

    <x-question-option letter="B">
        {{$question->B}}
    </x-question-option>

    <x-question-option letter="C">
        {{$question->C}}
    </x-question-option>

    <x-question-option letter="D">
        {{$question->D}}
    </x-question-option>

    <div id="timer" class="w-full h-16 mt-3 bg-red-100 text-red-900 rounded font-bold text-6xl flex items-center justify-center">

        {{ $question->duration }}

    </div>

    <a href="{{ route('attendance.question.answer.index',$question->id) }}" id="btnShowAnswer" class="hidden w-full h-16 mt-3 bg-red-100 text-red-900 rounded font-bold text-4xl items-center justify-center">
        عرض النتيجة
    </a>

</div>
@else
<div class="flex justify-center items-center text-4xl text-red-800 h-full">لايوجد سؤال</div>
@endif

<script>
    var CLOSE_QUESTION_URL = "{{ route('attendance.question.close',$question->id) }}";

    var step = "{{ $question->duration }}";

    var timer = document.getElementById('timer');

    var timeout = setInterval(() => {

        step = step - 1;
        
        timer.innerHTML = step;

        if (step == 0) {

            //stop timer
            clearInterval(timeout);
            fetch(CLOSE_QUESTION_URL)
                .then((response) => response.json())
                .then((data) => {
                    if (data == 1) {
                        //show result btn
                        document.getElementById('btnShowAnswer').style.display = 'flex'

                        //hide timer element
                        timer.style.display = 'none'

                    }
                });

        }
    }, 1000);
</script>
@endsection