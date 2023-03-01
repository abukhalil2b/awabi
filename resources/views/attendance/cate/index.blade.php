@extends('layouts.attendance')

@section('content')

<div class="p-1">
    <div class="grid grid-cols-3 gap-2">
    @foreach($cates as $cate)

    <x-attendance-cate-card :cate="$cate"/>

    @endforeach
    </div>

</div>

@endsection