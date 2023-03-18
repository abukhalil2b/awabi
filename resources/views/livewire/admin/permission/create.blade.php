<div class="p-3">
    <div class="flex gap-1 justify-center">
        <div>
            title
            <x-text-input wire:model.lazy="title" />
        </div>
        <div>
            slug
            <x-text-input wire:model.lazy="slug" />
        </div>
        <div>
            cate
            <x-text-input wire:model="cate" />
        </div>
    </div>

    @if($title != null && $slug != null && $cate != null)
    <div class="flex justify-center">
        <x-primary-button class="mt-4" wire:click="store">
            حفظ
        </x-primary-button>
    </div>
    @endif

    @foreach($permissions as $permission)
    <div class="mt-1 p-1 text-left bg-white border rounded">
<div class="w-4 h-4 bg-red-700 text-white text-[8px] flex justify-center items-center rounded-full">
{{ $permission->id }}
</div>
        <div>
            <span class="text-red-700">title: </span>
            {{ $permission->title }}
        </div>

        <div>
            <span class="text-red-700">slug: </span>
            {{ $permission->slug }}
        </div>

        <div>
            <span class="text-red-700">cate: </span>
            {{ $permission->cate }}
        </div>

    </div>
    @endforeach
</div>