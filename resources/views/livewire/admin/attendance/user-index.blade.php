<div>

    @foreach($users as $user)

    <a href="{{ route('admin.attendance.user.show',$user->id) }}" class="mt-1 border rounded bg-white p-1 flex flex-col hover:opacity-70">
        
        <div>
            الاسم:
            {{ $user->name }}
        </div>

        <div class="text-xs text-gray-500">
            المستخدم: 
            {{ $user->phone }}
        </div>
        
        <div class="text-xs text-gray-500">
            كلمة المرور:
            {{ $user->plain_password }}
        </div>
    </a>

    @endforeach
</div>