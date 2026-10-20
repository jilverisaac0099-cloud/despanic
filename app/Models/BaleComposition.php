<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaleComposition extends Model
{
protected $fillable = [
        'pounds_contributed',
        'remant',
        'drying_reception_id',
        'bale_drying_id'
    ];

    public function drying_reception()
    {
        return $this->belongsTo(DryingReception::class);
    }

    public function bale_drying()
    {
        return $this->belongsTo(BaleDrying::class);
    }
}
