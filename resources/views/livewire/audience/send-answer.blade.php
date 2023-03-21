<div class="p-3">
    <div class="mt-5 flex gap-3">
        <x-text-input wire:model.lazy="phone" placeholder="رقم الهاتف" type="number" class="w-full h-12" />
        <div class="border p-1 bg-white rounded w-1/2 h-12 flex justify-center items-center hover:cursor-pointer" wire:click="checkOldAnswer">
            تم
        </div>
    </div>

    @if($question)
    <div class="mt-5 border p-1 bg-white rounded w-full h-10 flex justify-center items-center hover:cursor-pointer">
        {{ $question->content }}
    </div>
    @endif

    @if($show)
    <div class="mt-10 w-full flex justify-around">

        <div wire:click="answer('A')" class="border p-1 bg-white rounded w-10 h-10 flex justify-center items-center hover:cursor-pointer">
            A
        </div>

        <div wire:click="answer('B')" class="border p-1 bg-white rounded w-10 h-10 flex justify-center items-center hover:cursor-pointer">
            B
        </div>

        <div wire:click="answer('C')" class="border p-1 bg-white rounded w-10 h-10 flex justify-center items-center hover:cursor-pointer">
            C
        </div>

        <div wire:click="answer('D')" class="border p-1 bg-white rounded w-10 h-10 flex justify-center items-center hover:cursor-pointer">
            D
        </div>
    </div>
    @endif

    <div class="w-full p-3 flex justify-center items-center">
        {{ $message}}
    </div>
</div>