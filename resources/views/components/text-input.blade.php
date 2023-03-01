@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 outline-0 border focus:ring-0 focus:!border-black p-1 h-10 w-full rounded-md shadow-sm']) !!}>
