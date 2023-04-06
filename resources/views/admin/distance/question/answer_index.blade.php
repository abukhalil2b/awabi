<x-admin-layout>
    <div class="h-16 w-full bg-slate-200 p-1 flex flex-col justify-center items-center">
        {{ $cate->title }}

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


</x-admin-layout>