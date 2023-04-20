@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 text-base text-white font-bold no-underline focus:outline-none bg-red-900 hover:no-underline'
            : 'block pl-3 pr-4 py-2 text-base text-white font-bold hover:no-underline no-underline focus:outline-none';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
