<button {{ $attributes->merge(['type' => 'button', 'class' => 'text-center items-center px-3 h-10 bg-white border border-gray-300 rounded-md text-xs text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
