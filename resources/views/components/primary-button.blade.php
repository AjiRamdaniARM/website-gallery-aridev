<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn hover:bg-red-300 bg-red-500 text-center  w-full py-2 rounded-md font-bold text-white']) }}>
    {{ $slot }}
</button>
