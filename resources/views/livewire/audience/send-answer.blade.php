<div class="p-3">

    @if($questionOpen)

    <div class="mt-5 flex gap-3" x-data="{ show:false,phone:null }" x-init="$watch('phone',(v) => v.length == 8 ? show=true : false )">
        <x-text-input wire:model.lazy="phone" x-model="phone" placeholder="رقم الهاتف" type="number" class="w-full h-12" />
        <div x-cloak x-show="show" class="border p-1 bg-white rounded w-1/2 h-12 flex justify-center items-center hover:cursor-pointer" wire:click="checkOldAnswer">
            تم
        </div>
    </div>



    @if($show)
    <div class="mt-10 w-full">

        @if($question)
        <div wire:click="answer('A')" class="border mt-5 p-1 bg-white rounded flex justify-center items-center hover:cursor-pointer">
            {{ $question->A }}
        </div>

        <div wire:click="answer('B')" class="border mt-5 p-1 bg-white rounded flex justify-center items-center hover:cursor-pointer">
            {{ $question->B}}
        </div>

        <div wire:click="answer('C')" class="border mt-5 p-1 bg-white rounded flex justify-center items-center hover:cursor-pointer">
            {{ $question->C }}
        </div>

        <div wire:click="answer('D')" class="border mt-5 p-1 bg-white rounded flex justify-center items-center hover:cursor-pointer">
            {{ $question->D }}
        </div>
        @endif

    </div>
    @endif

    <div class="w-full p-3 flex justify-center items-center">
        {{ $message}}
    </div>
    @else
    <x-primary-button class="w-full mt-5" onclick="location.href = '/audience/question/sendanswer' ">
        السؤال
    </x-primary-button>
    @endif
</div>