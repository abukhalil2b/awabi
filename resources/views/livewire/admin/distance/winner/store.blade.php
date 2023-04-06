<div x-data="{ show:false,phone:null }" x-init="$watch('phone',(v)=>v.length > 5 ? show=true : null)" class="border rounded p-1 bg-white">

    <div class="text-red-800 text-xs">
        <span class="text-blue-800">حفظ أرقام الفائزين</span>

        أدخل كل رقم هاتف في سطر مستقل
    </div>

    <textarea x-model="phone" wire:model.lazy="phones" class="w-full h-32 text-xs border border-gray-400 rounded focus:ring-0 focus:border-black"></textarea>

    <x-primary-button x-show="show" wire:click="storeWinners">
        حفظ
    </x-primary-button>

    <div>
        عدد الفائزين
        
    {{$phonesCount}}
    </div>
</div>