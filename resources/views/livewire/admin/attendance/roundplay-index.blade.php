<div>
    @foreach($roundplays as $roundplay)
    <div class="flex justify-between mt-1 p-1 border rounded bg-white {{ $roundplay->status =='active' ? '' : 'opacity-30' }}">
        <div>
            {{ $roundplay->title }}

           <div class="text-gray-300 {{ $roundplay->status == 'active' ? 'text-green-300' : '' }}">
           {{ __($roundplay->status) }}
           </div>

           <a href="{{ route('admin.attendance.roundplay.show',$roundplay->id) }}">
            تعديل
           </a>
        </div>


        <div>
            
            <a href="{{ route('admin.attendance.user_roundplay',$roundplay->id) }}" class="text-xs rounded border p-1 hover:bg-gray-50">
                المشاركين: {{ $roundplay->users->count() }}
            </a>

        </div>

    </div>
    @endforeach
</div>