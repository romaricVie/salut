@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xs sm:text-sm font-semibold sm:font-bold text-gray-900']) }}>
    {{ $value ?? $slot }}
</label>
