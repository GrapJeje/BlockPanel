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

        <div class="header__code">
            <p> {{ $code }} </p>
        </div>
    </div>

</header>
