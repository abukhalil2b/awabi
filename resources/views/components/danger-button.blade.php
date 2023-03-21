<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex justify-center items-center px-3 h-10 bg-red-800 border rounded text-xs text-white  hover:bg-red-700 border-0 focus:bg-red-700 active:bg-red-900 focus:outline-none  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>