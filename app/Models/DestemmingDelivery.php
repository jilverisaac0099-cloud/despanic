<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestemmingDelivery extends Model
{
protected $fillable=[
        "delivery_date",
        "bags_delivered",
        "destemming_preparation_id",
        "pilon_id"
    ];

    public function destemming_preparation()
    {
        return $this->belongsTo(DestemmingPreparation::class);
    }

    public function pilon()
    {
        return $this->belongsTo(Pilon::class);
    }
}
