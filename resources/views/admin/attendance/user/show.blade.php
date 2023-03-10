<x-admin-layout>

   <div x-data="adminAttendanceUserUpdate" x-init="user={{ $user }}; updateUrl='{{ route('api.admin.attendance.user.update') }}'">

      <div x-text="user.name" x-cloak x-show=" ! show"></div>

      <a href="#" @click="show=true" x-cloak x-show=" ! show" class="mt-4 text-gray-400">تعديل</a>

      <div x-cloak x-show="show">

         <div class="mt-4">
            الاسم
            <x-text-input x-model="user.name" />
         </div>

         <div class="mt-4">
            كلمة المرور
            <x-text-input x-model="user.password" />

         </div>

         <div class="mt-4 flex flex-col justify-center items-center">
            <div x-show="loading" class="loader w-10 h-10"></div>

            <x-secondary-button x-show=" ! loading" @click="update" class="w-full text-center">
               تحديث
            </x-secondary-button>
         </div>

      </div>
   </div>

</x-admin-layout>