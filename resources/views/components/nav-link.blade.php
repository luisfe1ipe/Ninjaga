@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1  text-lg font-medium leading-5 text-red-500 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1  text-lg font-medium leading-5 text-black dark:text-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
