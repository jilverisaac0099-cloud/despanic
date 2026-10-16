<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotsDetail extends Model
{
    protected $fillable=[
        "cut_number",
        "pounds",
        "quality",
        "lots_reception_id"
    ];

    public function lots_reception()
    {
        return $this->belongsTo(LotsReception::class, "lots_reception_id");
    }
}