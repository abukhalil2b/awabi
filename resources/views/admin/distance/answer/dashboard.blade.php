<x-admin-layout>
<div class="h-16 w-full bg-slate-200 p-1 flex flex-col justify-center items-center">
   

<div class="flex gap-1">
<div>
    الاجابات الصحيحة
    {{ $correctAnswerCount }}
</div>

<div>
    الاجابات الخاطئة
    {{ $wrongAnswerCount }}
</div>
</div>
</div>
    @foreach($answers as $answer)

    <div dir="ltr">
    {{ $answer->phone }},
    </div>

    @endforeach

</x-admin-layout>