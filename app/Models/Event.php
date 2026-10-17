<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=[
        "type",
        "date",
        "observations",
        "pilon_id"
    ];

    public function pilon()
    {
        return $this->belongsTo(Pilon::class);
    }
}
