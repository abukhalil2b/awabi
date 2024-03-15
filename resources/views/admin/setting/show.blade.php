<x-admin-layout>



   <div class="p-5 border flex justify-between">
      <div>
         {{ $setting->name }}
      </div>

      <div>
         <livewire:admin.setting.update :setting="$setting" />
      </div>
   </div>


</x-admin-layout>