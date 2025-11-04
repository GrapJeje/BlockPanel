<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerSession extends Model
{
    protected $fillable = [
        'server_id',
        'timestamp',
        'player_uuid',
        'session_type',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
