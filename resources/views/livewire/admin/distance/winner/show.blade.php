<div>
    <div x-data="{ show:false,phone:null }" x-init="$watch('phone',(v)=>v.length > 5 ? show=true : null)" class="border rounded p-1 bg-white">

        <div class="text-red-800 text-xs">
            <span class="text-blue-800"> البحث عن عدة مشتركين</span>

            أدخل كل رقم هاتف في سطر مستقل
        </div>

        <textarea x-model="phone" wire:model.lazy="phone" class="w-full h-32 text-xs border border-gray-400 rounded focus:ring-0 focus:border-black"></textarea>

        <x-primary-button x-show="show" wire:click="search">
            البحث
        </x-primary-button>

    </div>

    <div class="p-5 w-full mt-4 ">
        <span class="text-red-800 text-xs">نتيجة القرعة</span>

        <div style="background-image: url({{ asset('winner-bg.gif') }}); padding:5px;">

            @foreach($users as $key => $user)
            <div class="mt-1 flex justify-between gap-3 text-2xl">

                <div class="w-16 p-1 bg-[#900c0c] text-white border border-white rounded">
                    {{ $key+1 }}
                </div>

                <div class="w-full p-1 bg-[#900c0c] text-white border border-white rounded">
                    {{ $user->name }}
                </div>

                <div class="w-full p-1 bg-[#900c0c] text-white border border-white rounded">
                    @if($user->state)
                    {{ $user->state->name }}
                    @endif
                </div>

            </div>
            @endforeach
        </div>

    </div>

</div>