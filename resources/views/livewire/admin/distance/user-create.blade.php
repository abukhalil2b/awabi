<section class="space-y-6">

    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-distance-user')">
        + جديد
    </x-primary-button>

    @if($message)
    <div class="p-1 w-full bg-green-100 border border-green-600 text-green-600 flex items-center justify-center text-xs">
        {{ $message }}
    </div>
    @endif

    <x-modal name="create-distance-user" :show="false" focusable>
        <div class="p-6">


            <div class="mt-6">
                <x-input-label for="phone" class="sr-only" />

                <x-text-input type="number" wire:model.lazy="phone" class="outline-0 border p-1 h-10 mt-1 block w-full" placeholder="رقم الجوال" />

                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>



            <div class="mt-6 flex justify-between">
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