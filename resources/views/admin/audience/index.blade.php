@extends('layouts.attendance')

@section('content')

<div class="text-white">
    عدد المسجلين
    {{ count($audiences) }}
</div>
<div class="p-3" x-data="{show:false}">
    <div @click="show = true" class="text-white cursor-pointer">عرض</div>

    <div x-cloak x-show="show">
        @foreach($audiences as $audience)

        <div class="mt-2 border rounded p-1 ">
            <div class="text-white text-xs {{ $audience->selected == 1 ? 'active' : ''}}">
                {{ $audience->phone }}
            </div>
            <div class="text-[10px] text-gray-300">
                {{ $audience->name }}
            </div>
        </div>

        @endforeach
    </div>

    <div x-data="{ show:false }" class="mt-10">
        <div x-cloak x-show=" ! show " @click="show=true" class="text-red-600 cursor-pointer">حذف</div>
        <form x-clock x-show="show" action="{{ route('admin.audience.delete') }}" method="post">
            @csrf
            <button type="submit" class="text-red-600">تأكيد الحذف</button>
        </form>
    </div>
</div>


@endsection