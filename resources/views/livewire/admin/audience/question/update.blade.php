<div class="mt-2">

    <x-text-input wire:model.lazy="content" placeholder="محتوى السؤال" class="mt-2" />
    <x-text-input wire:model.lazy="A" placeholder="الخيار الأول  " class="mt-2" />
    <x-text-input wire:model.lazy="B" placeholder="الخيار الثاني  " class="mt-2" />
    <x-text-input wire:model.lazy="C" placeholder="الخيار الثالث  " class="mt-2" />
    <x-text-input wire:model.lazy="D" placeholder="الخيار الرابع  " class="mt-2" />

    <div>
        <x-secondary-button wire:click="saveChange" class="mt-2">
            حفظ التعديلات
        </x-secondary-button>
    </div>

    <x-secondary-button wire:click="updateStatus('ready')" class="mt-2 {{ $audienceQuestion->status == 'ready' ? ' active' : '' }}">
        ready
    </x-secondary-button>

    <x-secondary-button wire:click="updateStatus('close')" class="mt-2 {{ $audienceQuestion->status == 'close' ? ' active' : '' }}">
        close
    </x-secondary-button>

    <x-secondary-button wire:click="updateStatus('open')" class=" mt-2{{ $audienceQuestion->status == 'open' ? ' active' : '' }}">
        open
    </x-secondary-button>
</div>