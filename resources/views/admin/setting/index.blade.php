<x-admin-layout>


<div class="bg-white p-5 border flex justify-between">
   <div>
   name
   </div>

   <div>
   status
   </div>
</div>
    
@foreach($settings as $setting)

<a href="{{ route('admin.setting.show',$setting->id) }}" class="p-5 border flex justify-between">
   <div>
   {{ $setting->name }}
   </div>

   <div>
   {{ $setting->status }}
   </div>
</a>

@endforeach

</x-admin-layout>