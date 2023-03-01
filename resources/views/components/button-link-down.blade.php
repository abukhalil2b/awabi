@props(['active'])

@php
$classes = ($active ?? false)
            ? 'rounded-full text-xs text-white bg-blue-600 w-12 h-12  flex justify-center items-center hover:bg-blue-400 transition duration-150 ease-in-out'
            : 'rounded-full text-xs text-blue-800 bg-gray-200 w-12 h-12  flex justify-center items-center hover:bg-blue-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
