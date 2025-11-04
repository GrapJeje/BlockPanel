<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerConfiguration extends Model
{
    protected $fillable = [
        'whitelist',
        'max_players',
        'difficulty',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
