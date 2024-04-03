<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="name" :value="' الاسم  '" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                تسجيل جديد
            </x-primary-button>
        </div>
    </form>


    <script>
        function toggle() {

            var passwordInput = document.getElementById('password');
            var passwordAttribute = passwordInput.getAttribute('type');

            if (passwordAttribute == 'password') {
                passwordInput.setAttribute('type', 'text')
            } else {
                passwordInput.setAttribute('type', 'password')
            }

        }

    </script>


</x-guest-layout>