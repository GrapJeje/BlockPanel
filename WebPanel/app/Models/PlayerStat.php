<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerStat extends Model
{
    protected $fillable = [
        'server_id',
        'timestamp',
        'player_uuid',
        'kills',
        'deaths',
        'playtime_ms',
        'is_online',
        'last_login',
        'current_world',
        'position',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
