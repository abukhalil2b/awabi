<x-admin-layout>

    <livewire:admin.attendance.roundplay-update :roundplay="$roundplay" />



    <livewire:admin.attendance.roundplay-delete-answer :roundplay="$roundplay" />

    <livewire:admin.attendance.roundplay-delete-user :roundplay="$roundplay" />

    <div class="mt-4 flex justify-center">
      <div>
          @foreach ($users as $user)
            <div>{{ $user->phone }} - {{ $user->name }}</div>
        @endforeach
      </div>
    </div>
</x-admin-layout>
