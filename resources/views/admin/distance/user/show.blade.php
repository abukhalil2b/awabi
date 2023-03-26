<x-admin-layout>
    <div class="card">

        <div class="mt-1">
           الاسم: {{ $user->name }}
        </div>

        <div class="mt-1">
            الهاتف: {{ $user->phone }}
        </div>

       

        <div class="mt-1">
البلد: 
            @if($user->state)
            {{ $user->state->name }}
            @endif

        </div>

        <livewire:admin.distance.user-update :user="$user" />

    </div>
</x-admin-layout>