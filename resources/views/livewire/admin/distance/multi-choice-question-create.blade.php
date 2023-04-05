<div>

    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-question')">
        + جديد
    </x-primary-button>

    <x-modal name="create-question" :show="false" focusable>
        <div class="p-6">


            <div class="mt-6">
                <x-input-label for="content" />
                <x-text-input id="content" wire:model.lazy="content" class="outline-0 border p-1 h-10 mt-1 block w-full" placeholder=" محتوى السؤال " />
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            حدد الإجابة الصحيحة بالضغط على رمز الخيار
            <x-input-error :messages="$errors->get('ans')" class="mt-2" />
            <!-- A -->
            <div class="mt-6">
                <x-input-label for="A" />
                <div class="flex">
                    <div wire:click="$set('ans', 'A')" class="h-10 w-10 bg-gray-300 text-white flex justify-center items-center rounded-r hover:cursor-pointer hover:bg-green-600 {{ $ans=='A' ? '!bg-green-400': '' }}">A</div>
                    <x-text-input class=" rounded-r-none" id="A" wire:model.lazy="A" />
                </div>
                <x-input-error :messages="$errors->get('A')" class="mt-2" />
            </div>

            <!-- B -->
            <div class="mt-6">
                <x-input-label for="B" />
                <div class="flex">
                    <div wire:click="$set('ans', 'B')" class="h-10 w-10 bg-gray-300 text-white flex justify-center items-center rounded-r hover:cursor-pointer hover:bg-green-600 {{ $ans=='B' ? '!bg-green-400': '' }}">B</div>
                    <x-text-input class=" rounded-r-none" id="B" wire:model.lazy="B" />
                </div>
                <x-input-error :messages="$errors->get('B')" class="mt-2" />
            </div>


            <!-- C -->
            <div class="mt-6">
                <x-input-label for="C" />
                <div class="flex">
                    <div wire:click="$set('ans', 'C')" class="h-10 w-10 bg-gray-300 text-white flex justify-center items-center rounded-r hover:cursor-pointer hover:bg-green-600 {{ $ans=='C' ? '!bg-green-400': '' }}">C</div>
                    <x-text-input class=" rounded-r-none" id="C" wire:model.lazy="C" />
                </div>
                <x-input-error :messages="$errors->get('C')" class="mt-2" />
            </div>

            <!-- D -->
            <div class="mt-6">
                <x-input-label for="D" />
                <div class="flex">
                    <div wire:click="$set('ans', 'D')" class="h-10 w-10 bg-gray-300 text-white flex justify-center items-center rounded-r hover:cursor-pointer hover:bg-green-600 {{ $ans=='D' ? '!bg-green-400': '' }}">D</div>
                    <x-text-input class=" rounded-r-none" id="D" wire:model.lazy="D" />
                </div>
                <x-input-error :messages="$errors->get('D')" class="mt-2" />
            </div>

            <!-- duration -->
            <div class="mt-6">
                <x-input-label for="duration" />
                <x-text-input id="duration" wire:model.lazy="duration" value="30" class="mt-1" type="number" placeholder="duration" />
                <x-input-error :messages="$errors->get('duration')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-between">

            <x-primary-button class="ml-3" wire:click="save" wire:loading.attr="disabled">
                    حفظ
                </x-primary-button>

                <x-secondary-button x-on:click="$dispatch('close')">
                    إلغاء
                </x-secondary-button>

            </div>
        </div>
    </x-modal>

    <script>
        window.addEventListener('close-question-creation', event => {
           location.reload()
        })
    </script>

</div>