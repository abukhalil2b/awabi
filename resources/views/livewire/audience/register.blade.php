<div class="p-3">

    <div class="mt-5 flex flex-col gap-2">

        <x-text-input wire:model.lazy="name" placeholder="الاسم" class="w-full h-12 text-red-800" />

        <div class="mt-5 border p-1 bg-white rounded w-full h-12 flex justify-center items-center hover:cursor-pointer text-red-800" wire:click="register">
            تسجيل
        </div>

        <div class="mt-5 text-green-500 text-2xl text-center">
            {{ $message }}
        </div>

    </div>

</div>