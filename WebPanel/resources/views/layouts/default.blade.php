<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @php
        $meta = [
            'title' => View::yieldContent('title', 'Dashboard'),
            'favicon' => View::yieldContent('favicon', asset('img/favicon/favicon-32x32.png')),
            'description' => View::yieldContent('description', 'Hoi, ik ben Jason. De software developer in opleiding met passie voor clean code en innovatieve oplossingen.'),
            'ogImage' => View::yieldContent('ogImage', asset('img/og-image.jpg')),
            'keywords' => View::yieldContent('keywords', 'software developer, web development, Laravel, PHP, JavaScript, portfolio, Jason'),
            'canonicalUrl' => View::yieldContent('canonicalUrl', url()->current()),
            'themeColor' => View::yieldContent('themeColor', '#1e40af')
        ];
    @endphp

    @include('partials.meta')
    @yield('meta')

    <!-- CSS -->
    @vite('resources/sass/app.scss')

    @livewireStyles
    @livewireScripts
</head>
<body>

<!--------------
      Main
---------------->

<div class="container">
    @yield('content')
    @if (isset($slot))
        {{ $slot }}
    @endif
</div>

<!--------------
    scripts
---------------->

@vite(['resources/js/app.js'])
@yield('scripts')
</body>
</html>
