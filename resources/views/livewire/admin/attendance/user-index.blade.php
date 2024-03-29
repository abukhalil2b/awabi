<div>
    <x-secondary-button wire:click="resetPassword" class="mt-4 print:hidden">
        <div class="flex gap-1">
            <div>
                تغير كلمة المرور للجميع
            </div>
            <div class="loader w-4 h-4" wire:loading></div>
        </div>
    </x-secondary-button>


    @foreach($users as $user)

    <a href="{{ route('admin.attendance.user.show',$user->id) }}" class="mt-1 border rounded bg-white p-1 flex flex-col gap-1 hover:opacity-70 print:flex-row print:items-center print:text-3xl print:mt-5">

        <div>
            {{ $user->name }}.
        </div>

        <div class="text-xs text-gray-500">
            المستخدم:
            <span class="font-bold">{{ $user->phone }}</span>
        </div>

        <div class="text-xs text-gray-500">
            كلمة المرور:
            <span class="font-bold">{{ $user->plain_password }}</span>
        </div>
    </a>

    @endforeach
</div>