@extends('layouts.attendance')

@section('content')

<div class="text-white">
    عدد المسجلين
    {{ count($audiences) }}
</div>
<div class="p-3" x-data="{show:false}">
    <div @click="show = true" class="text-white">show</div>

    <div x-cloak x-show="show">
        @foreach($audiences as $audience)

        <div class="mt-2 border rounded p-1">
            <div class="text-white">
                {{ $audience->phone }}
            </div>
            <div class="text-xs text-gray-300">
                {{ $audience->name }}
            </div>
        </div>

        @endforeach
    </div>

    <div class="mt-10">
    <form action="{{ route('admin.audience.delete') }}" method="post">
        @csrf
       <button type="submit" class="text-red-600">delete</button>
    </form>
    </div>
</div>


@endsection