@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block py-2 pl-3 pr-4 font-montserrat rounded md:bg-transparent text-vxproject-secondary md:p-0 dark:text-white uppercase'
            : 'block py-2 pl-3 pr-4 font-montserrat rounded md:bg-transparent text-vxproject-primary md:p-0 dark:text-white uppercase';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
