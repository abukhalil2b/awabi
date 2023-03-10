<x-app-layout>


    <div class="p-3">
        <div class="mt-1 p-4 bg-white shadow sm:rounded-lg">
            حدث بياناتك (الاسم  -  الولاية)
        </div>

        <div class="mt-1 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="mt-1 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            @include('profile.partials.update-password-form') </div>
    </div>
</x-app-layout>