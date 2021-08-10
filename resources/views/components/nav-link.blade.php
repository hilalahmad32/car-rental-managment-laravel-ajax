@props(['active'])

@php
$classes = ($active ?? false)
? 'ml-1 '
: '';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>