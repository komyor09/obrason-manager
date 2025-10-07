{{-- resources/views/components/card.blade.php --}}
@props([
    'title' => null,
    'subtitle' => null,
    'img' => null,
    'footer' => null,
    'color' => 'primary',
])

<div {{ $attributes->merge(['class' => 'card border-'.$color]) }}>
    @if($img)
        <img src="{{ $img }}" class="card-img-top img-fluid" alt="Card image">
    @endif

    <div class="card-content">
        <div class="card-body">
            @if($title)
                <h4 class="card-title">{{ $title }}</h4>
            @endif
            @if($subtitle)
                <p class="card-subtitle text-muted">{{ $subtitle }}</p>
            @endif
            {{ $slot }}
        </div>
    </div>

    @if($footer)
        <div class="card-footer d-flex justify-content-between">
            {!! $footer !!}
        </div>
    @endif
</div>
