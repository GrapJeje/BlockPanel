<?php

use function Livewire\Volt\{state, layout, mount};
use Illuminate\Support\Facades\Http;

layout('layouts.default');
state(['code', 'players' => []]);

mount(function () {

    $uuids = [
        '378198566e9a48669a73922c8c684b21',
        '853c80ef3c3749fdaa49938b674adae6',
        '069a79f444e94726a5befca90e38aaf5',
    ];

    $this->players = collect($uuids)->map(function ($uuid) {
        $response = Http::withoutVerifying()
            ->get("https://api.minetools.eu/profile/{$uuid}");
        $name = $response->json('raw.name') ?? 'Unknown';
        return [
            'uuid' => $uuid,
            'name' => $name,
            'online' => (bool)random_int(0, 1),
        ];
    });
});

?>

<div>
    @vite('resources/sass/pages/players.scss')
    @section('title', $code)

    <livewire:components.header :code="$code" :page="'players'"/>

    <div class="players">
        <x-datacontainer>
            <x-slot:title>
                <strong> Players </strong>
            </x-slot>

            <table class="players__table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>UUID</th>
                    <th>Status</th>
                </tr>
                </thead>

                <tbody>
                @foreach($players as $player)
                    <tr onclick="window.location='{{ route('player.show', ['code' => $code, 'uuid' => $player['uuid']]) }}'" title="Player details">
                        <td>{{ $player['name'] }}</td>
                        <td>{{ $player['uuid'] }}</td>
                        <td>
                            @if($player['online'])
                                <span class="status-dot online"></span> Online
                            @else
                                <span class="status-dot offline"></span> Offline
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </x-datacontainer>
    </div>
</div>
