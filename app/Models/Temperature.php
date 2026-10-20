<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
protected $fillable=[
        "date_time",
        "temperature_fahrenheit",
        "pilon_id"
    ];

    public function pilon()
    {
        return $this->belongsTo(Pilon::class);
}

}
