<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilonOrigin extends Model
{
    protected $fillable=[
        "pounds_contributed",
        "lot_reception_id",
        "pilon_id"
    ];

    public function lots_reception()
    {
        return $this->belongsTo(LotsReception::class);
    }

    public function pilons()
    {
        return $this->belongsTo(Pilon::class);
    }
}
