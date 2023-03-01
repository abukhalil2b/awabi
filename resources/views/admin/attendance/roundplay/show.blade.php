<x-app-layout>

    <livewire:admin.attendance.roundplay-update :roundplay="$roundplay" />

    <div class="mt-5 w-full p-1 rounded text-red-800 text-center">
        الأسئلة التي طرحت في هذه الجولة
        ( {{ $roundplay->answers->count()}} )
    </div>
</x-app-layout>