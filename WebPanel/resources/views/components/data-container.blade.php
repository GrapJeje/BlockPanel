<div class="component">
    <p>{{ $title }}</p>
    <div>
        @if ($slot->isEmpty())
            No content found
        @else
            {{ $slot }}
        @endif
    </div>
</div>
