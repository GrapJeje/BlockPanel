<?php

use function Livewire\Volt\{state, layout, mount};

layout('layouts.default');
state(['code', 'uuid', 'player']);

mount(function ($code, $uuid) {
    $response = Http::withoutVerifying()
        ->get("https://api.minetools.eu/profile/{$uuid}");
    $name = $response->json('raw.name') ?? 'Unknown';

    $this->player = [
        'uuid' => $uuid,
        'name' => $name,

        'stats' => [
            'server_id' => $code,
            'timestamp' => now()->subMinutes(rand(1, 60))->toDateTimeString(),
            'kills' => rand(0, 20),
            'deaths' => rand(0, 10),
            'playtime_ms' => rand(1_000_000, 50_000_000),
            'is_online' => (bool)random_int(0, 1),
            'last_login' => now()->subHours(rand(1, 72))->toDateTimeString(),
            'current_world' => fake()->randomElement(['world', 'world_nether', 'world_the_end']),
            'position' => [
                'x' => fake()->randomFloat(2, -500, 500),
                'y' => fake()->randomFloat(2, 40, 120),
                'z' => fake()->randomFloat(2, -500, 500),
            ],
        ],

        'sessions' => [
            [
                'server_id' => 1,
                'timestamp' => now()->subHours(2)->toDateTimeString(),
                'player_uuid' => $uuid,
                'session_type' => 'login',
            ],
            [
                'server_id' => 1,
                'timestamp' => now()->subHour()->toDateTimeString(),
                'player_uuid' => $uuid,
                'session_type' => 'world_change',
            ],
        ],
    ];
});

?>

<div>
    @vite('resources/sass/pages/player.scss')
    @section('title', $code . " - " . $player['name'] . " (" . $player['uuid'] . ")")

    <livewire:components.header :code="$code" :page="'players'"/>

    <div class="back-btn">
        <a href="{{ route('server.players', $code) }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 18l-6-6 6-6"></path>
            </svg>
            Back to Players
        </a>
    </div>

    <div class="player__container">
        <x-datacontainer>
            <div class="player">
                <div class="player__header">
                    <img src="https://mc-heads.net/avatar/{{ $player['uuid'] }}/80" alt="{{ $player['name'] }}">
                    <div>
                        <h1>{{ $player['name'] }}</h1>
                        <p class="uuid">{{ $player['uuid'] }}</p>
                    </div>
                </div>

                <div class="player__section-title">Player Stats</div>
                <table class="player__table">
                    <tbody>
                    <tr>
                        <th>Timestamp</th>
                        <td>{{ $player['stats']['timestamp'] }}</td>
                    </tr>
                    <tr>
                        <th>Kills</th>
                        <td>{{ $player['stats']['kills'] }}</td>
                    </tr>
                    <tr>
                        <th>Deaths</th>
                        <td>{{ $player['stats']['deaths'] }}</td>
                    </tr>
                    <tr>
                        <th>Playtime (ms)</th>
                        <td>{{ number_format($player['stats']['playtime_ms']) }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if($player['stats']['is_online'])
                                <span class="status-dot online"></span> Online
                            @else
                                <span class="status-dot offline"></span> Offline
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Last Login</th>
                        <td>{{ $player['stats']['last_login'] }}</td>
                    </tr>
                    <tr>
                        <th>Current World</th>
                        <td>{{ $player['stats']['current_world'] }}</td>
                    </tr>

                    <tr>
                        <th>Position</th>
                        <td>
                            X: {{ $player['stats']['position']['x'] }} <br>
                            Y: {{ $player['stats']['position']['y'] }} <br>
                            Z: {{ $player['stats']['position']['z'] }}
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="player__section-title">Sessions</div>
                <table class="player__table">
                    <thead>
                    <tr>
                        <th>Timestamp</th>
                        <th>Type</th>
                        <th>Server</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($player['sessions'] as $session)
                        <tr>
                            <td>{{ $session['timestamp'] }}</td>
                            <td>{{ ucfirst($session['session_type']) }}</td>
                            <td>{{ $session['server_id'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </x-datacontainer>
    </div>
</div>
