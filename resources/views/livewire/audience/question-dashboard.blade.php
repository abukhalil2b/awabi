<div class="p-5">

    <div class="flex gap-1">
        @foreach($questions as $key => $question)

        @if($question->status == 'ready')
        <div wire:click="getQuestion({{ $question->id }})" class="w-10 flex justify-center items-center bg-white rounded p-2 hover:cursor-pointer">
            {{ $key + 1 }}
        </div>
        @else
    <div class="w-10 flex justify-center items-center bg-gray-100 rounded p-2">
        {{ $key + 1 }}
    </div>
        @endif

        @endforeach
    </div>


    @if($audienceQuestion)
    <div class="mt-3 card text-2xl">
        {{ $audienceQuestion->content }}

        @if($showAnswer)
        <div class="text-blue-800">
        {{ $audienceQuestion[$audienceQuestion->ans] }}
        </div>
        @endif
    </div>

    @endif

    <div class="">
        @foreach($answers as $key => $answer)

        <div class="mt-2 w-full flex justify-between items-center bg-white rounded-sm">
            <div class="flex gap-1 text-4xl">
                <div class="bg-gray-600 w-8 flex justify-center items-center text-white">
                    {{ $key + 1 }}
                </div>
                {{ $answer->phone }}
            </div>
            <div class="text-2xl">
                {{ $answer->created_at }}
            </div>
        </div>

        @endforeach
    </div>

    @if($showTimer)
    <div id="timer" class="w-full h-16 mt-3 bg-red-100 text-red-900 rounded font-bold text-6xl flex items-center justify-center">
        30
    </div>

    <a href="#" wire:click="getAnswers" id="btnShowAnswer" class="hidden w-full h-16 mt-3 bg-red-100 text-red-900 rounded font-bold text-4xl items-center justify-center">
        عرض النتيجة
    </a>

    <script>
        var step = 30;

        var timer = document.getElementById('timer');

        var timeout = setInterval(() => {

            step = step - 1;

            timer.innerHTML = step;

            if (step == 0) {

                //stop timer
                clearInterval(timeout);

                document.getElementById('btnShowAnswer').style.display = 'flex';

                document.getElementById('timer').style.display = 'none';
            }
        }, 1000);
    </script>

    @endif


</div>