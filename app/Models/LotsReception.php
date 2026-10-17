<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotsReception extends Model
{
    protected $table = "lots_reception";

    protected $fillable=[
        "producer",
        "origin",
        "date",
        "pounds_received",
        "remarks"
    ];

    public function lots_details()
    {
        return $this->hasMany(LotsDetail::class);
    }

    public function pilon_origins()
    {
        return $this->hasMany(PilonOrigin::class);
    }
}
