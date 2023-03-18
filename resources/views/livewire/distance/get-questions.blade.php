<div>
    @if($answers)
    لقد تم استلام إجابتك
    @foreach($answers as $answer)
 
    <div class="mt-3">
    <div class="text-blue-800">
       السؤال: {{ $answer->questionContent }}
    </div>
    <div class="text-red-800">
       إجابتك: {{ $answer->userAnswerContent }}
    </div>
    </div>

    @endforeach

    @endif

    <div x-data="getDistanceQuestions( {{ json_encode($questions) }} )">

        <template x-for="question in questions">
            <div class="mt-1 border border-black rounded" :key="question.id">
                <div class="bg-white p-1 w-full border rounded font-bold text-red-800" x-text="question.content"></div>
                <div @click="select({qid:question.id,opt:'A'})" class="bg-white mt-3 p-1 w-full border rounded" :class="question.opt=='A' ? 'bg-green-100' : '' " x-text="question.A"></div>
                <div @click="select({qid:question.id,opt:'B'})" class="bg-white mt-3 p-1 w-full border rounded" :class="question.opt=='B' ? 'bg-green-100' : '' " x-text="question.B"></div>
                <div @click="select({qid:question.id,opt:'C'})" class="bg-white mt-3 p-1 w-full border rounded" :class="question.opt=='C' ? 'bg-green-100' : '' " x-text="question.C"></div>
                <div @click="select({qid:question.id,opt:'D'})" class="bg-white mt-3 p-1 w-full border rounded" :class="question.opt=='D' ? 'bg-green-100' : '' " x-text="question.D"></div>
            </div>
        </template>
        <div x-cloak x-show="showButton" class="mt-3 flex justify-center">
            <x-primary-button @click="sendAnswer($wire)">
                إرسل الإجابات
            </x-primary-button>
        </div>

        <div x-cloak x-show="loading" class="mt-3 flex justify-center">
            <div class="loader"></div>
        </div>
        <div x-text="message" class="mt-3 text-green-800 flex justify-center"></div>

    </div>
</div>