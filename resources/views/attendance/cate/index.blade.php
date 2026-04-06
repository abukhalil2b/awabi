@extends('layouts.attendance')

@section('content')
    <div class="px-2 py-2">
        <div class="max-w-7xl mx-auto px-2 sm:px-2 lg:px-4">
            <div class="grid grid-cols-3 gap-2">
                @foreach ($cates as $cate)
                    <x-attendance-cate-card :cate="$cate" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
