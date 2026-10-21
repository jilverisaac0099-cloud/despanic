<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExitDrying extends Model
{
    protected $fillable = [
        'weight_dry_exit',
        'humedity_weight_entry',
        'quantity_bale',
        'remnat_weight',
        'pickup_date',
        'drying_reception_id',
        'tobacco_classes_id'
    ];

    public function drying_reception()
    {
        return $this->belongsTo(DryingReception::class);
    }

    public function tobacco_class()
    {
        return $this->belongsTo(TobaccoClass::class);
    }
}
