<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalePackaging extends Model
{
    protected $fillable = [
        'bale_number',
        'packing_date',
        'class_name',
        'provenance',
        'pylon_origin',
        'net_weight',
        'status_bale',
        'registration_date',
        'bale_drying_id'
    ];

    public function bale_drying()
    {
        return $this->belongsTo(BaleDrying::class, 'bale_drying_id');
    }
}
