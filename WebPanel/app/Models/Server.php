<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = [
        'url',
        'cpu_specs',
        'max_ram',
        'max_storage',
        'max_players',
        'configuration',
    ];

    public function stats()
    {
        return $this->hasMany(ServerStat::class);
    }

    public function playerSessions()
    {
        return $this->hasMany(PlayerSession::class);
    }

    public function playerStats()
    {
        return $this->hasMany(PlayerStat::class);
    }

    public function config()
    {
        return $this->belongsTo(ServerConfiguration::class);
    }
}
