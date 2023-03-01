<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin - distance - user - create
        </h2>
    </x-slot>

    <div  class="p-3">
     
    <livewire:admin.attendance.user-roundplay :roundplay="$roundplay"/>

   
    
    </div>
</x-app-layout>