@extends('layouts.attendance')

@section('content')

@if($question->status == 'open')

<x-question-content>
    {{$question->content}}
</x-question-content>
<div class="p-3">
    <div x-data="{ show:false }">
        <div class="flex gap-5">
            <div @click="show=true" class="w-32 text-white cursor-pointer">عرض الخيارات</div>
            <a href="#" class="w-32 text-white cursor-pointer" onclick="toggelTimer()">توقيف وتشغيل العد التنازلي</a>
        </div>
        <x-question-option letter="A" x-cloak x-show="show">
            {{$question->A}}
        </x-question-option>

        <x-question-option letter="B" x-cloak x-show="show">
            {{$question->B}}
        </x-question-option>

        <x-question-option letter="C" x-cloak x-show="show">
            {{$question->C}}
        </x-question-option>

        <x-question-option letter="D" x-cloak x-show="show">
            {{$question->D}}
        </x-question-option>
    </div>
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

    var isPaused = false;

    var timeout = setInterval(() => {

        if (!isPaused) {
            step = step - 1;
        }

        timer.innerHTML = step;

        if (step == 0) {

            //stop timer
            clearInterval(timeout);
            fetch(CLOSE_QUESTION_URL)
                .then((response) => {
                    return response.json()
                })
                .then((data) => {

                    if (data.status == 'close') {

                        //show result btn
                        document.getElementById('btnShowAnswer').style.display = 'flex'

                        //hide timer element
                        timer.style.display = 'none'

                    }
                });
        }
    }, 1000);

    toggelTimer = () => {
        this.isPaused = !this.isPaused;
    }
</script>
@endsection