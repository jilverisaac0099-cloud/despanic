<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestemmingClousure extends Model
{
    protected $fillable=[
        "peso_gold",
        "total_sting",
        "total_vein",
        "date_clousure",
        "pilon_id"
    ];
    public function pilon()
    {
        return $this->belongsTo(Pilon::class);
    }
}
