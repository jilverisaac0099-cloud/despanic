<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestemmingPreparation extends Model
{
    protected $fillable=[
        "wet_date",
        "bag_quantity",
        "pound_entry",
        "pilon_id"
    ];

    public function pilon()
    {
        return $this->belongsTo(Pilon::class);
    }
public function DestemmingDelivery ()
    {
        return $this->hasMany(DestemmingDelivery::class);
    }
}

