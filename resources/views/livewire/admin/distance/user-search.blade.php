<div>

    <div x-data="{ show:false,phone:null }" x-init="$watch('phone',(v)=>v.length > 5 ? show=true : null)" class="border rounded p-1 bg-white">

        <div class="text-red-800 text-xs">
            أدخل كل رقم هاتف في سطر مستقل
        </div>

        <textarea x-model="phone" wire:model.lazy="phone" class="w-full h-32 text-xs border border-gray-400 rounded focus:ring-0 focus:border-black"></textarea>

        <x-primary-button x-show="show" wire:click="search">
            البحث
        </x-primary-button>

    </div>

    <div class="w-full  mt-4 ">
        <span class="text-red-800 text-xs">نتيجة البحث</span>

        <table class="w-full border">
            <tr>
                <td>
                    الاسم
                </td>
                <td>
                    الهاتف
                </td>
                <td>
                    البلد
                </td>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                   <a class="active" href="{{ route('admin.distance.user.show',$user->id) }}">
                   {{ $user->phone }}
                   </a>
                </td>
                <td>
                    @if($user->state)
                    {{ $user->state->name }}
                    @endif
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>