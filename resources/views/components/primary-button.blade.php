<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-3 h-10 bg-gray-800 border rounded-md text-xs text-white tracking-widest hover:bg-gray-700 border-0 focus:bg-gray-700 active:bg-gray-900 focus:outline-none  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
