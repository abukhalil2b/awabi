@props(['plink'=>false,'letter'=>''])

@php
$classes = $plink ? '!bg-green-200 text-green-500 animate-pulse' : '' ;
@endphp

<div  {{ $attributes->merge(["class"=>"w-full h-18 bg-blue-100 text-blue-900 rounded font-bold text-5xl flex items-center justify-start p-3 mt-3  $classes "]) }}>
    <span class="text-gray-400 pl-5">{{ $letter }}</span>
{{ $slot }}
</div>