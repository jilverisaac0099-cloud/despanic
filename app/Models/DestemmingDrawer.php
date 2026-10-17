<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestemmingDrawer extends Model
{
    protected $fillable=[
        "number",
        "pounds_tripe",
        "collection_date",
        "pilon_id",
        "tobacco_classes_id"
    ];

    public function pilon()
    {
        return $this->belongsTo(Pilon::class);
    }

    public function tobacco_class()
    {
        return $this->belongsTo(TobaccoClass::class);
    }
}
