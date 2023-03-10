<x-admin-layout>


    <div class="p-1">

        @foreach($roles as $role)

        <div class="mt-2 border rounded p-1">
        {{ $role->title }}
        <a href="{{ route('admin.role_permission',$role->id) }}" class="text-xs text-gray-400 block">
            صلاحيات 
        </a>
        </div>

        @endforeach

    </div>

</x-admin-layout>