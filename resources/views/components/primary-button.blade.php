<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full inline-flex justify-center items-center px-4 py-2 bg-royal-purple border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-yellow hover:text-black focus:bg-lime-yellow focus:text-black active:bg-royal-purple focus:outline-none focus:ring-2 focus:ring-royal-purple focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
