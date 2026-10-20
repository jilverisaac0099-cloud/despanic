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

    public function bale_compositions()
    {
        return $this->hasMany(BaleComposition::class, 'bale_drying_id');
    }

    public function bale_packagings()
    {
        return $this->hasMany(BalePackaging::class, 'bale_drying_id');
    }
}

