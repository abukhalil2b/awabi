<div>
    <div class="flex gap-3 items-center">
        <x-secondary-button wire:click="resetPassword" class="print:hidden">
            تغير كلمة المرور للجميع
        </x-secondary-button>
        <x-secondary-button wire:click="resetName" class="print:hidden">
            تفريغ حقل الاسماء لإستقبال مشاركين جدد
        </x-secondary-button>
        <div>
            <div class="loader w-8 h-8" wire:loading></div>
        </div>
    </div>


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