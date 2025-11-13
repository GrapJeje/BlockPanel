<?php

use function Livewire\Volt\{state, layout};

layout('layouts.default');
state(['code']);

?>

<div>
    @vite('resources/sass/pages/server.scss')
    @section('title', $code)
    <livewire:components.header :code="$code" :page="'home'"/>

    <div class="dashboard__server-settings">
        <x-datacontainer>
            <x-slot:title>
                <strong> RAM usage </strong>
            </x-slot>

            <div class="stat">
                <div>
                    <div class="stat__main">
                        <p>
                            <span class="green">2860.5 MB</span>
                            <span class="light-gray">/ 5000.0 MB</span>
                        </p>
                    </div>
                    <p class="stat__secondary">57.21%</p>
                </div>
            </div>
        </x-datacontainer>

        <x-datacontainer>
            <x-slot:title>
                <strong> CPU Usage </strong>
            </x-slot>

            <div class="stat">
                <div>
                    <div class="stat__main">
                        <p class="green">0.98%</p>
                    </div>
                    <p class="stat__secondary">1m</p>
                </div>

                <div>
                    <div class="stat__main">
                        <p class="green">0.95%</p>
                    </div>
                    <p class="stat__secondary">15m</p>
                </div>

                <div>
                    <div class="stat__main">
                        <p class="green">1.12%</p>
                    </div>
                    <p class="stat__secondary">30m</p>
                </div>
            </div>
        </x-datacontainer>

        <x-datacontainer>
            <x-slot:title>
                <strong> Storage usage </strong>
            </x-slot>

            <div class="stat">
                <div>
                    <div class="stat__main">
                        <p>
                            <span class="green">124 GB</span>
                            <span class="light-gray">/ 255.7 GB</span>
                        </p>
                    </div>
                    <p class="stat__secondary">54.95%</p>
                </div>
            </div>
        </x-datacontainer>
    </div>
</div>
