@props(['href' => null])
<a href="{{ $href }}"
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'w-full inline-flex justify-center items-center px-4 py-2 border border-royal-purple rounded-md font-semibold text-xs text-royal-purple uppercase tracking-widest hover:bg-bright-purple hover:text-white focus:ring-2 focus:ring-royal-purple focus:ring-offset-2 transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</a>
