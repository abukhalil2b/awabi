<x-admin-layout>
    @foreach($updatedUsers as $user)

    <div class="mt-1 border rounded bg-white p-1 flex flex-col">

        <a href="{{ route('admin.distance.user.show',$user->id) }}" class="text-xs text-black">
            الاسم:
            {{ $user->name }}
        </a>
        <div class="text-xs text-gray-400">
            الهاتف:
            {{ $user->phone }}
        </div>
    </div>

    @endforeach

</x-admin-layout>