@props(['title' => null, 'empty' => 'No content found'])

<div class="component">
    @if (!empty($title))
        <p class="component__title">{{ $title }}</p>

        <div class="component__content">
            @if (trim($slot) === '')
                <p class="text-gray-500 italic">{{ $empty }}</p>
            @else
                {{ $slot }}
            @endif
        </div>
    @else
        @if (trim($slot) === '')
            <p class="text-gray-500 italic">{{ $empty }}</p>
        @else
            {{ $slot }}
        @endif
    @endif
</div>
