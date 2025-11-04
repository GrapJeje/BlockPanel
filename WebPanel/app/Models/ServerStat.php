<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerStat extends Model
{
    protected $fillable = [
        'server_id',
        'timestamp',
        'cpu_percentage',
        'ram_mb',
        'disk_gb',
        'ms',
        'open_threads',
        'player_count',
        'entity_count',
        'server_status',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
