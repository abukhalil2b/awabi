<x-admin-layout>

    <div class="border rounded p-1 bg-white">
        <form action="{{ route('admin.distance.user.search') }}" method="post">
            @csrf
            <div class="text-red-800 text-xs">
                أدخل كل رقم هاتف في سطر مستقل
            </div>
            <textarea name="phone" class="w-full h-32 text-xs border border-gray-400 rounded focus:ring-0 focus:border-black"></textarea>
            <x-primary-button>
                البحث
            </x-primary-button>
        </form>
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
                    {{ $user->phone }}
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
</x-admin-layout>