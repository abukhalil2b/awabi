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
<div class="text-blue-800 p-1">
    إضغط على الرقم لإظهار الخيارات
</div>
    @foreach($winners as $winner)

    <div x-data="{ showDeleteButton:false, showOption:false }" class="mt-2 rounded border p-1 flex justify-between items-center">
        <div @click="showOption=true">
            {{ $winner->phone }}
        </div>

        <div x-cloak x-show="showOption" class="w-1/2 flex justify-between items-center">
            <a href="https://api.whatsapp.com/send/?phone={{ $winner->phone }}&text=''&type=phone_number&app_absent=0" class="flex" target="_blank">
                <img src="{{ asset('whatsapp_logo_new-2x.png') }}" alt="whatsapp_logo_new-2x.png" width="20" class="bg-green-300 rounded-full">
                <span class="mx-1 text-xs">واتسأب</span>
            </a>

            <div x-cloak x-show=" ! showDeleteButton " @click="showDeleteButton=true" class="text-red-800 hover:text-red-400 cursor-pointer">
                حذف
            </div>
            <div x-cloak x-show="showDeleteButton" class="font-bold text-red-800 hover:text-red-400 cursor-pointer" wire:click="delete({{ $winner->id }})">
                تأكيد الحذف
            </div>
        </div>
    </div>

    @endforeach


</div>