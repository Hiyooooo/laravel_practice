@props(['href' => '#', 'active' => false])

@php
    $isActive = $active ?: (url()->current() === url($href));
    $base = 'flex items-center p-2 text-base font-medium rounded-lg transition duration-75';
    $cls = $isActive
        ? 'bg-gray-100 text-gray-900 dark:bg-gray-700 dark:text-white'
        : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $base . ' ' . $cls]) }}>
    {{ $slot }}
</a>