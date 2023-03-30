<div>

    <div class="mt-5 w-full p-1 rounded text-red-800 flex flex-col items-center">
        المشاركين في هذه الجولة
        ( {{ $usersCount}} )

        <div x-data="{show:false}">

        <x-danger-button @click="show = true" x-show=" ! show" class="mt-1 w-44">
            حذف المشاركين مع النتيجة
        </x-danger-button>
        <x-danger-button x-cloak x-show="show" wire:click="deleteUsers" class="mt-1 w-44">
            تأكيد الحذف 
        </x-danger-button>
        </div>
    </div>
</div>