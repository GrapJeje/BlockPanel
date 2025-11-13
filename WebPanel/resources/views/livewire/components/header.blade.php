<?php

use function Livewire\Volt\{state};

state(['code', 'page']);

?>

<header>
    @vite('resources/sass/components/header.scss')

    <div class="header">

        <a href="{{ route('server.index', ['code' => $code]) }}" class="header__logo">
            <img src="{{ asset('img/logo.png') }}" alt="BlockPanel Logo">
            <p>BlockPanel</p>
        </a>

        <div class="header__code" onclick="copyCode('{{ $code }}')" title="Click to copy">
            <p> {{ $code }} </p>
        </div>
    </div>

    <nav class="nav">
        <x-datacontainer>
            <a href="{{ route('server.index', ['code' => $code]) }}" class="nav__item">
                <img src="{{ asset('img/navigation/home.png') }}" alt="Home">
                <p @if($page == "home") class="active" @endif >Home</p>
            </a>
        </x-datacontainer>
        <x-datacontainer>
            <a href="{{ route('server.players', ['code' => $code]) }}" class="nav__item">
                <img src="{{ asset('img/navigation/players.png') }}" alt="Players">
                <p @if($page == "players") class="active" @endif >Players</p>
            </a>
        </x-datacontainer>
    </nav>

    <script>
        function copyCode(code) {
            navigator.clipboard.writeText(code)
                .then(() => {
                    const el = document.querySelector('.header__code p');
                    el.textContent = code + ' ✓';
                    el.style.transition = 'color 0.3s ease';
                    el.style.color = 'var(--primary-100)';
                    setTimeout(() => {
                        el.textContent = code;
                        el.style.color = 'var(--primary-200)';
                    }, 1000);
                })
                .catch(err => console.error('Kopiëren mislukt:', err));
        }
    </script>
</header>
