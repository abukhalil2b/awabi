<x-admin-layout>

    <form action="{{ route('admin.distance.whatsapp.store') }}" method="POST">
        @csrf
        <div class="flex gap-5">
        <textarea name="text" class="h-16 rounded"></textarea>
        <x-primary-button class="">
            حفظ
        </x-primary-button>
        </div>
    </form>

    <div class="p-1">

        @foreach($whatsapps as $whatsapp)

        <div class="flex justify-between items-center border p-1 rounded">
            <div>
                {{ $whatsapp->text }}
            </div>

            <div>
               <a href="{{ route('admin.distance.whatsapp.delete',$whatsapp->id) }}" class="text-red-800" >
                حذف
               </a>
            </div>

        </div>

        @endforeach

    </div>

</x-admin-layout>