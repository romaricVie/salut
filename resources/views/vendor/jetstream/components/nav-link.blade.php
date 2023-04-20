@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center no-underline focus:outline-none hover:no-underline outline-none p-0'
            : 'inline-flex items-center hover:no-underline no-underline focus:outline-none outline-none p-0';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
