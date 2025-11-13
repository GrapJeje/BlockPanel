<?php

use function Livewire\Volt\{state};

state(['code']);

?>

<header>
    @vite('resources/sass/components/header.scss')

    <div class="header">

        <a href="" class="header__logo">
            <img src="{{ asset('img/logo.png') }}" alt="BlockPanel Logo">
            <p>BlockPanel</p>
        </a>

        <div class="header__code" onclick="copyCode('{{ $code }}')" title="Click to copy">
            <p> {{ $code }} </p>
        </div>
    </div>

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
