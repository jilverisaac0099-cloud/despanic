<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaleDrying extends Model
{
    protected $fillable = [
        'bale_code',
        'net_weight',
        'packaging_date',
        'tobacco_classes_id'
    ];

    public function tobacco_class()
    {
        return $this->belongsTo(TobaccoClass::class, 'tobacco_classes_id');
    }
}

