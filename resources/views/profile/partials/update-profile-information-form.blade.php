<section>
    <header>

        <h2 class="text-lg font-medium text-gray-900">
            تحديث الاسم
        </h2>

    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="الاسم" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

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