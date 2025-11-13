<?php

use Livewire\Volt\Volt;

Volt::route('/{code}', 'server')
    ->where('code', '[A-Za-z0-9]{5}');
