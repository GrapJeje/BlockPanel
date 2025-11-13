<div class="component">
    <p>{{ $title }}</p>
    <div class="component__content">
        @if ($slot->isEmpty())
            No content found
        @else
            {{ $slot }}
        @endif
    </div>
</div>
