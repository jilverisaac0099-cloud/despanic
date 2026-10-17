<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VeinDestemming extends Model
{
    protected $fillable=[
        "amount_bags",
        "total_pounds",
        "date_weighing",
        "vein_destemming",
        "pilon_id"
    ];

    public function pilon()
    {
        return $this->belongsTo(Pilon::class, "pilon_id");
    }
}
