<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

Route::prefix('/{code}')
    ->where(['code' => '[A-Za-z0-9]{5}'])
    ->group(function () {
        Volt::route('/', 'server')
        ->name('server.index');
        Volt::route('/players', 'serverplayers')
        ->name('server.players');
    });
