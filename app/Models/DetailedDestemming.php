<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailedDestemming extends Model
{
    protected $fillable=[
        "detailed_week",
        "days",
        "pounds_tripe",
        "pounds_sting",
        "registration_date",
        "destemming_delivery_id",
        "tobacco_classes_id"
    ];

    public function destemming_delivery()
    {
        return $this->belongsTo(DestemmingDelivery::class, "destemming_delivery_id");
    }

    public function tobacco_class()
    {
        return $this->belongsTo(TobaccoClass::class, "tobacco_classes_id");
    }
}
