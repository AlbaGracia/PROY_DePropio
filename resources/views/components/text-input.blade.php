@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300  focus:border-royal-purple focus:ring-royal-purple rounded-md shadow-sm']) }}>
