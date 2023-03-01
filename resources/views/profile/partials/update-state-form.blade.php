<section>
    <header>
       الولاية
    </header>

    <form method="post" action="{{ route('state.update') }}">
        @csrf
        <div x-data="{ userStateId: '{{ auth()->user()->state_id }}',selectStateId(stateId){this.userStateId = stateId} }" class="p-1 grid grid-cols-3 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-12 gap-1">
            @foreach(App\Models\State::all() as $state)

            <div @click="selectStateId( {{ $state->id }} )" class="w-20 h-6 text-[8px] flex justify-center items-center border rounded" :class=" userStateId == {{ $state->id }} ? 'bg-green-100 border-green-700 text-green-700' : '' ">
                {{ $state->name }}
            </div>

            @endforeach
            <input x-model="userStateId" name="state_id" type="hidden">
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>
                حفظ 
            </x-primary-button>

            @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                تم الحفظ
            </p>
            @endif
        </div>
    </form>
</section>