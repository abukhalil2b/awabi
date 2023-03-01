<div>
    @if($show)
    <div wire:loading class="w-full">
        <div class="flex justify-center items-center h-[200px]">
            <div class="loader"></div>
        </div>
    </div>
    <div wire:loading.remove>

        <div wire:click="sendAnswer('A')" class="my-6 p-3 w-full bg-blue-50 text-blue-900 border border-blue-900 rounded hover:cursor-pointer">
            {{ $question->A }}
        </div>

        <div wire:click="sendAnswer('B')" class="my-6 p-3 w-full bg-blue-50 text-blue-900 border border-blue-900 rounded hover:cursor-pointer">
            {{ $question->B }}
        </div>

        <div wire:click="sendAnswer('C')" class="my-6 p-3 w-full bg-blue-50 text-blue-900 border border-blue-900 rounded hover:cursor-pointer">
            {{ $question->C }}
        </div>

        <div wire:click="sendAnswer('D')" class="my-6 p-3 w-full bg-blue-50 text-blue-900 border border-blue-900 rounded hover:cursor-pointer">
            {{ $question->D }}
        </div>
    </div>
    @else
    <div class="h-[500px] flex justify-center items-center">
            <x-secondary-button onclick="location.reload()">
                اذهب للسؤال
            </x-secondary-button>
        </div>

    @endif
</div>