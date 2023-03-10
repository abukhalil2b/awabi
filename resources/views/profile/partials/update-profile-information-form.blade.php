<section>


    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="الاسم" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            الولاية
        </div>
        <div x-data="{ userStateId: '{{ auth()->user()->state_id }}',selectStateId(stateId){this.userStateId = stateId} }" class="grid grid-cols-3 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-12 gap-1">

            @foreach(App\Models\State::all() as $state)

            <div @click="selectStateId( {{ $state->id }} )" class="w-20 h-6 text-[8px] flex justify-center items-center border rounded" :class=" userStateId == {{ $state->id }} ? 'bg-green-100 border-green-700 text-green-700' : '' ">
                {{ $state->name }}
            </div>

            @endforeach
            <input x-model="userStateId" name="state_id" type="hidden">
        </div>

        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        <x-input-error :messages="$errors->get('state_id')" class="mt-2" />

        <div class="flex items-center gap-4">
            <x-primary-button>
                حفظ
            </x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                تم الحفظ
            </p>
            @endif
        </div>
    </form>
</section>