<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

Route::prefix('/{code}')
    ->where(['code' => '[A-Za-z0-9]{10}'])
    ->group(function () {
        Volt::route('/', 'server')
        ->name('server.index');
        Volt::route('/players', 'server-players')
        ->name('server.players');
        Volt::route('/player/{uuid}', 'server-player')
            ->name('player.show');
    });
