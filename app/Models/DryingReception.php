<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DryingReception extends Model
{
    protected $table = 'drying_receptions';

    protected $fillable = [
        'date_income',
        'weigth_gold',
        'weight_damp',
        'status',
        'destemming_clousure_id'
    ];

    public function destemming_clousure()
    {
        return $this->belongsTo(DestemmingClousure::class);
    }
}
