<?php

use function Livewire\Volt\{state, layout};

layout('layouts.default');
state(['code']);

?>

<div>
    @section('title', $code)
    <livewire:components.header :code="$code" />

    <x-datacontainer>
        <x-slot:title>
            Server Error
        </x-slot>

        <strong>Whoops!</strong> Something went wrong!
    </x-datacontainer>
</div>
