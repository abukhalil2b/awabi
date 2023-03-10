<x-admin-layout>
    <div>
        {{ $role->title }}
    </div>
    <form action="{{ route('admin.role_permission.store',['role'=>$role->id]) }}" method="post">
        @csrf

        <div class="mt-4">
            attendanceUsers
        </div>
        <div class="text-xs">
            @foreach($attendanceUsers as $permission)

            <label class="mt-2 block p-1 rounded border">
                <input type="checkbox" name="permissionIds[]" value="{{ $permission->id }}" @if( $role->hasPermission($permission->id) ) checked @endif>
                {{ $permission->title }}

            </label>

            @endforeach
        </div>

        <div class="mt-4">
            attendanceRoundplays
        </div>
        <div class="text-xs">
            @foreach($attendanceRoundplays as $permission)

            <label class="mt-2 block p-1 rounded border">
                <input type="checkbox" name="permissionIds[]" value="{{ $permission->id }}" @if( $role->hasPermission($permission->id) ) checked @endif>
                {{ $permission->title }}

            </label>

            @endforeach
        </div>

        <div class="mt-4">
            attendanceUserRoundplays
        </div>
        <div class="text-xs">
            @foreach($attendanceUserRoundplays as $permission)

            <label class="mt-2 block p-1 rounded border">
                <input type="checkbox" name="permissionIds[]" value="{{ $permission->id }}" @if( $role->hasPermission($permission->id) ) checked @endif>
                {{ $permission->title }}

            </label>

            @endforeach
        </div>

        <div class="mt-4">
            attendanceCates
        </div>
        <div class="text-xs">
            @foreach($attendanceCates as $permission)

            <label class="mt-2 block p-1 rounded border">
                <input type="checkbox" name="permissionIds[]" value="{{ $permission->id }}" @if( $role->hasPermission($permission->id) ) checked @endif>
                {{ $permission->title }}

            </label>

            @endforeach
        </div>

        <div class="mt-4">
            attendanceQuestions
        </div>
        <div class="text-xs">
            @foreach($attendanceQuestions as $permission)

            <label class="mt-2 block p-1 rounded border">
                <input type="checkbox" name="permissionIds[]" value="{{ $permission->id }}" @if( $role->hasPermission($permission->id) ) checked @endif>
                {{ $permission->title }}

            </label>

            @endforeach
        </div>


        <div class="mt-4">
            distanceUsers
        </div>
        <div class="text-xs">
            @foreach($distanceUsers as $permission)

            <label class="mt-2 block p-1 rounded border">
                <input type="checkbox" name="permissionIds[]" value="{{ $permission->id }}" @if( $role->hasPermission($permission->id) ) checked @endif>
                {{ $permission->title }}

            </label>

            @endforeach
        </div>

        <div class="mt-4">
            distanceCates
        </div>
        <div class="text-xs">
            @foreach($distanceCates as $permission)

            <label class="mt-2 block p-1 rounded border">
                <input type="checkbox" name="permissionIds[]" value="{{ $permission->id }}" @if( $role->hasPermission($permission->id) ) checked @endif>
                {{ $permission->title }}

            </label>

            @endforeach
        </div>

        <div class="mt-4">
            distanceQuestions
        </div>
        <div class="text-xs">
            @foreach($distanceQuestions as $permission)

            <label class="mt-2 block p-1 rounded border">
                <input type="checkbox" name="permissionIds[]" value="{{ $permission->id }}" @if( $role->hasPermission($permission->id) ) checked @endif>
                {{ $permission->title }}

            </label>

            @endforeach
        </div>


        <x-primary-button>save</x-primary-button>
    </form>

</x-admin-layout>