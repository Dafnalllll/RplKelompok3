@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-light text-sm text-white']) }}>
    {{ $value ?? $slot }}
</label>
