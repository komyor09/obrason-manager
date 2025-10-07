@props(['link', 'name', 'icon' => ''])

<li class="submenu-item">
    <a href="{{ $link }}">
        @if ($icon)
            <i class="{{ $icon }} me-1"></i>
        @endif
        {{ $name }}
    </a>
</li>
