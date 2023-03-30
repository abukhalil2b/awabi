<div>
    <div class="mt-5 w-full p-1 rounded text-red-800 flex flex-col items-center">
        الاجابات التي تم ارسالها في هذه الجولة
        ( {{ $answersCount}} )



        <div x-data="{show:false}">

            <x-danger-button @click="show = true" x-show=" ! show" class="mt-1 w-44">
                حذف الاجابات
            </x-danger-button>
            <x-danger-button x-cloak x-show="show" wire:click="deleteAnswers" class="mt-1 w-44">
                تأكيد الحذف
            </x-danger-button>
        </div>

    </div>

</div>