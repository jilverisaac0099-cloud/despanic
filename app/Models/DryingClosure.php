<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DryingClosure extends Model
{
    protected $fillable = [
        'extended_date',
        'pickup_date',
        'weight_gold',
        'weight_damp',
        'weight_dry',
        'loss_humedity',
        'percentage_loss',
        'bales_total',
        'weight_remnant',
        'hours_total',
        'final_status',
        'date_cloused',
        'drying_reception_id'
    ];

    public function drying_reception()
    {
        return $this->belongsTo(DryingReception::class, 'drying_reception_id');
    }
}
