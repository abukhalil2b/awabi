<div>

    <div x-data="{ show:false,phone:null }" x-init="$watch('phone',(v)=>v.length > 5 ? show=true : null)" class="mt-4 border rounded p-1 bg-white">

        <div class="text-blue-800 text-xs">
            البحث برقم الهاتف
        </div>

        <x-text-input x-model="phone" type="number" wire:model.lazy="phone" class="w-full text-xs border border-gray-400 rounded focus:ring-0 focus:border-black" />

        <x-primary-button x-show="show" wire:click="search">
            البحث
        </x-primary-button>

    </div>

    <div class="w-full  mt-4 ">
        <span class="text-red-800 text-xs">نتيجة البحث</span>

        <table class="w-full border">

            @foreach($users as $user)
            <tr>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    @if($user->state)
                    {{ $user->state->name }}
                    @endif
                </td>
                <td>

                    <a href="https://api.whatsapp.com/send/?phone={{ $user->phone }}&text={{ $whatsappText }}&type=phone_number&app_absent=0" class="flex" target="_blank">
                        <img src="{{ asset('whatsapp_logo_new-2x.png') }}" alt="whatsapp_logo_new-2x.png" width="20" class="bg-green-300 rounded-full">
                        {{ $user->phone }}
                    </a>

                </td>
                <td>
                    <a class="text-xs" href="{{ route('admin.distance.user.show',$user->id) }}">
                        عرض
                    </a>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>