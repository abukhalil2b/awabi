<div class="p-3">

    <div class="mt-5 flex flex-col gap-2" x-data="{ show:false,phone:null }" x-init="$watch('phone',(v) => v.length == 8 ? show=true : false )">

        <x-text-input wire:model.lazy="phone" x-model="phone" placeholder="رقم الهاتف" type="number" class="w-full h-12 text-red-800" />

        <div x-cloak x-show="show">
            <x-text-input wire:model.lazy="name" x-model="name" placeholder="الاسم" class="w-full h-12 text-red-800" />

            <div class="mt-5 border p-1 bg-white rounded w-full h-12 flex justify-center items-center hover:cursor-pointer text-red-800" wire:click="register">
                تسجيل
            </div>

        </div>
        <div class="mt-5 text-green-500 text-2xl text-center">
            {{ $message }}
        </div>

        <div>
            @error('phone') <span class="mt-5 text-red-500 text-2xl text-center">{{ $message }}</span> @enderror
        </div>

        <div>
            @error('name') <span class="mt-5 text-red-500 text-2xl text-center">{{ $message }}</span> @enderror
        </div>

    </div>

</div>