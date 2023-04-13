<div class="w-full flex justify-center items-start gap-4">
   
    <x-text-input type="number" class="mt-4 w-32" placeholder='ادخل رمز الحذف' wire:model="code" />

    @if($code == 1234)
    <x-danger-button class="mt-4 w-32" wire:click="delete">
        حذف كل الأسئلة
    </x-danger-button>
    @endif

    <div class="mt-5 text-green-400 font-bold">
        {{ $message }}
    </div>

</div>