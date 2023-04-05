<div>
    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'copy-question')">
        + نسخ من أسئلة الجمهور التي تم عرضها
    </x-primary-button>

    <x-modal name="copy-question" :show="false">
        <div class="p-6 overflow-scroll">
            <div class="flex justify-center">

                <div class="loader w-5 h-5" wire:loading></div>
            </div>

            <div wire:loading.remove>
                @foreach($questions as $key => $question)

                <div wire:click="copy({{ $question->id }},{{ $cate->id }})" class="mt-1 p-1 border rounded bg-white cursor-pointer">
                    {{ $key + 1 }}-
                    {{ $question->content }}
                </div>

                @endforeach
            </div>

        </div>
    </x-modal>

</div>