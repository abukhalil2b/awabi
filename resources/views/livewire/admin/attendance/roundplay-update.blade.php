<div class="flex flex-col items-center">

    <div class="flex gap-1">
        <div>
            <x-text-input wire:model.lazy="roundplay.title" id="title" class="w-full" required autofocus />
            <x-input-error :messages="$errors->get('roundplay.title')" class="mt-2" />
        </div>

        <x-secondary-button wire:click="update" class="text-xs" wire:loading.attr="disabled">
        حفظ التعديل
        </x-secondary-button>
    </div>

    <div class="mt-3 w-64">

        <div class="text-center flex gap-2 ">
            <div wire:click="active" class="bg-gray-50 hover:cursor-pointer hover:opacity-50 rounded p-1 border w-full {{ $roundplay->status == 'active' ? 'bg-green-50 border-green-800 text-green-800' : '' }}">
            تفعيل هذه الجولة وتعطيل البقية
            </div>
        </div>

    </div>


    <div class="w-20">
                <div wire:loading class="loader w-4 h-4"></div>
            </div>
    <div id="message" class="hidden mt-3 w-64 text-center text-green-500 p-1">
        تم الحفظ
    </div>


    <script>
        window.addEventListener('updated', () => {
            var message = document.getElementById('message');

            message.style.display = 'block';

            setTimeout(() => {
                message.style.display = 'none'
            }, 1000)

        })
    </script>
</div>