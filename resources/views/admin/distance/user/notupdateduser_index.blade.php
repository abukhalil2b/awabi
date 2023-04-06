<x-admin-layout>
    @foreach($notUpdatedUsers as $user)

    <div class="mt-1 border rounded bg-white p-1 flex gap-2">

        <a href="{{ route('admin.distance.user.show',$user->id) }}" class="text-xs text-black">
            عرض
        </a>
        <div class="text-xs text-gray-400">

            <a href="https://api.whatsapp.com/send/?phone={{ $user->phone }}&text={{ $whatsappText }}&type=phone_number&app_absent=0" class="flex" target="_blank">
                <img src="{{ asset('whatsapp_logo_new-2x.png') }}" alt="whatsapp_logo_new-2x.png" width="15" class="bg-green-300 rounded-full">
                {{ $user->phone }}
            </a>

        </div>
    </div>

    @endforeach

</x-admin-layout>