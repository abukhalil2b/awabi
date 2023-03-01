<section class="space-y-6">

    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'create-roundplay')"
    >
    + جديد
</x-primary-button>

    <x-modal name="create-roundplay" :show="false" focusable>
        <div  class="p-6">
           

            <div class="mt-6">
                <x-input-label for="title"  class="sr-only" />

                <x-text-input
                    id="title"
                    wire:model.lazy="roundplay.title"
                    class="outline-0 border p-1 h-10 mt-1 block w-3/4"
                    placeholder="العنوان"
                />

                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

     

            <div class="mt-6">
                <x-secondary-button x-on:click="$dispatch('close')">
                    إلغاء
                </x-secondary-button>

                <x-primary-button class="ml-3" wire:click="save" x-on:click="$dispatch('close')">
                   حفظ
                </x-primary-button>
            </div>
        </div>
    </x-modal>
</section>
