<div x-data="{open:false}" class="fixed right-20 bottom-5">

    <div x-cloak x-show="open" class="flex gap-1 mb-1">

        <x-button-link-down href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
            الإدارة
        </x-button-link-down>

        <x-button-link-down href="{{ route('attendance.cate.index') }}" :active="request()->routeIs('attendance.cate.index')">
            الرئيسية
        </x-button-link-down>
        
        <x-button-link-down href="{{ route('attendance.roundplay.result') }}" :active="request()->routeIs('attendance.roundplay.result')">
            النتائج
        </x-button-link-down>

        <x-button-link-down href="{{ route('attendance.roundplay.answer.index') }}" :active="request()->routeIs('attendance.roundplay.answer.index')">
           <div class="text-[8px]"> أسئلة الجولة</div>
        </x-button-link-down>

        <x-button-link-down href="{{ route('audience.question.dashboard') }}" :active="request()->routeIs('audience.question.dashboard')">
           <div class="text-[8px]"> أسئلة الجمهور</div>
        </x-button-link-down>


    </div>
    <div x-on:click="open=true" x-on:click.outside="open=false" class="cursor-pointer rounded-full bg-blue-600 text-white w-7 h-7 flex justify-center items-center hover:bg-blue-800 hover:text-white">

    </div>
</div>