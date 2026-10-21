<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OvenHorno extends Model
{
protected $fillable = [
        'start_time',
        'end_time',
        'scheduled_hours',
        'average_temperature',
        'observations',
        'drying_reception_id'
    ];

    public function drying_reception()
    {
        return $this->belongsTo(DryingReception::class);
    }
}

