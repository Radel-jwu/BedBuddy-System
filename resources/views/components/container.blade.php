@props(['highlight' => false])

<div @class(['highlight' => $highlight, 'container'])>
    {{ $slot }}
    <a {{ $attributes }} class="btn">View Details</a>
</div>