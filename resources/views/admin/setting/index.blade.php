<x-admin-layout>

    
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