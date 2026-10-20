<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawerEntry extends Model
{
    protected $table = 'drawers_entry';

    protected $fillable = [
        'number',
        'weight_humedity',
        'date_registration',
        'control_oven',
        'date_cycle',
        'start_time',
        'scheduled_hours',
        'average_temperature',
        'observations',
        'tobacco_classes_id',
        'drying_reception_id'
    ];

    public function tobacco_class()
    {
        return $this->belongsTo(TobaccoClass::class, 'tobacco_classes_id');
    }

    public function drying_reception()
    {
        return $this->belongsTo(DryingReception::class, 'drying_reception_id');
    }
}
