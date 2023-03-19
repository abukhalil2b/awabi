<x-admin-layout>
    <div onclick="window.print()" class="flex justify-center items-center w-20 border rounded hover:cursor-pointer print:hidden">
        طباعة
    </div>

    <div class="">
        <!-- not in user -->
        <livewire:admin.attendance.user-create />

        <livewire:admin.attendance.user-index />

    </div>
</x-admin-layout>