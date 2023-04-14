<div class="p-3">
    <div class="p-1 flex justify-center items-center border rounded bg-gray-400 text-white font-bold">
        {{ $wincate->title }}
    </div>

    <div class="p-1 flex justify-center items-center">
        عدد الفائزين{{ count($winners) }}
    </div>


    <div x-data="{ show:false,phone:null }" x-init="$watch('phone',(v)=>v.length > 5 ? show=true : null)" class="border rounded p-1 bg-white">

        <div class="text-red-800 text-xs">
            <span class="text-blue-800">حفظ أرقام الفائزين</span>

            أدخل كل رقم هاتف في سطر مستقل
        </div>

        <textarea x-model="phone" wire:model.lazy="phones" class="w-full h-32 text-xs border border-gray-400 rounded focus:ring-0 focus:border-black"></textarea>

        <x-primary-button x-cloak x-show="show" wire:click="storeWinners">
            حفظ
        </x-primary-button>

    </div>

    @if($message)
    <div class="mt-3 w-full text-green-700 border border-green-700 bg-green-100 rounded p-1 flex justify-center items-center">
        {{ $message }}
    </div>
    @endif

    @foreach($winners as $winner)

    <div x-data="{ show:false }" class="mt-2 rounded border p-1 flex justify-between items-center">
        <div @click="show=true">
            {{ $winner->phone }}
        </div>

        <div x-show="show" class="text-red-800 hover:text-red-400 cursor-pointer" wire:click="delete({{ $winner->id }})">
            حذف
        </div>
    </div>

    @endforeach


</div>