<x-app-layout>

   <div x-data="adminAttendanceUserUpdate" x-init="user={{ $user }}; updateUrl='{{ route('api.admin.attendance.user.update') }}'">

      <div x-text="user.name" x-cloak x-show=" ! show"></div>

      <a href="#" @click="show=true" x-cloak x-show=" ! show" class="mt-4 text-gray-400">تعديل</a>

      <div x-cloak x-show="show">

         <label>
            الاسم
            <x-text-input x-model="user.name" />
         </label>
         @csrf
         <x-secondary-button @click="update" class="mt-4">
            تحديث
         </x-secondary-button>
      </div>
   </div>

</x-app-layout>