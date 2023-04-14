<div class="flex flex-col items-center">
    <div wire:click="incPoint( {{$userId}},{{$roundplayId}} )" class="border rounded-full cursor-pointer h-8 w-8 flex justify-center items-center text-3xl">+</div>
    <div class="text-red-400 text-xl">
    {{ $mark }}
    </div>
    <div wire:click="decPoint( {{$userId}},{{$roundplayId}} )" class="mt-1 border rounded-full cursor-pointer h-8 w-8 flex justify-center items-center text-3xl">-</div>
</div>