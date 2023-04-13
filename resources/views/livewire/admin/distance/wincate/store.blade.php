<div>
    <x-text-input wire:model="title" />

    <x-primary-button wire:click="storeWincate" class="mt-4">
        حفظ
    </x-primary-button>

    <hr class="mt-5">

    @foreach($wincates as $wincate)

    <div class="mt-2 rounded border p-1 flex justify-center items-center">
        <a href=" {{ route('admin.distance.wincate.show',$wincate->id) }}">
            {{ $wincate->title }}
        </a>
    </div>

    @endforeach




</div>