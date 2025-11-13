@php
    $defaults = [
        'title' => 'Dashboard',
        'favicon' => asset('img/favicon/favicon-32x32.png'),
        'description' => "Hoi, ik ben Jason. De software developer in opleiding met passie voor clean code en innovatieve oplossingen.",
        'ogImage' => asset('img/og-image.jpg'),
        'keywords' => 'software developer, web development, Laravel, PHP, JavaScript, portfolio, Jason',
        'canonicalUrl' => url()->current(),
        'themeColor' => '#1e40af'
    ];

    $meta = array_merge($defaults, $meta ?? []);
@endphp

    <!-- Primary Meta Tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="robots" content="index, follow">
<meta name="theme-color" content="{{ $meta['themeColor'] }}">

<!-- SEO Meta Tags -->
<title>{{ config('app.name') }} | {{ $meta['title'] }}</title>
<meta name="description" content="{{ $meta['description'] }}">
<meta name="keywords" content="{{ $meta['keywords'] }}">
<meta name="author" content="Jason">
<link rel="canonical" href="{{ $meta['canonicalUrl'] }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $meta['canonicalUrl'] }}">
<meta property="og:title" content="{{ $meta['title'] }} | {{ config('app.name') }}">
<meta property="og:description" content="{{ $meta['description'] }}">
<meta property="og:image" content="{{ $meta['ogImage'] }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:creator" content="@grapjeje">
<meta name="twitter:title" content="{{ config('app.name') }} | {{ $meta['title'] }}">
<meta name="twitter:description" content="{{ $meta['description'] }}">
<meta name="twitter:image" content="{{ $meta['ogImage'] }}">

<!-- Favicon -->
@if($meta['favicon'] == asset('img/favicon/favicon-32x32.png'))
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}?v={{ time() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}?v={{ time() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}?v={{ time() }}">
@else
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $meta['favicon'] }}?v={{ time() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $meta['favicon'] }}?v={{ time() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $meta['favicon'] }}?v={{ time() }}">
@endif
<link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}?v={{ time() }}">

<!-- Preload Critical Resources -->
<link rel="preload" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" as="style">

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">

<!-- Structured Data -->
<script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Person',
        'name' => 'Jason',
        'jobTitle' => 'De Software Developer in Opleiding',
        'url' => config('app.url'),
        'sameAs' => [
            'https://github.com/grapjeje',
            'https://www.linkedin.com/in/jason-van-loon'
        ]
    ], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
</script>
