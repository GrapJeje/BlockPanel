<?php

use function Livewire\Volt\{state, layout};

layout('layouts.default');
state(['code']);

?>

<div>
    @vite('resources/sass/pages/server.scss')
    @section('title', $code)
    <livewire:components.header :code="$code" :page="'players'"/>
</div>
