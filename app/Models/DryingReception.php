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

    public function drying_receptions()
    {
        return $this->hasMany(DryingReception::class);
    }

    public function drawer_entrys()
    {
        return $this->hasMany(DrawerEntry::class, 'drying_reception_id');
    }


    public function oven_hornos()
    {
        return $this->hasMany(OvenHorno::class, 'drying_reception_id');
    }
    public function exit_dryings()
    {
        return $this->hasMany(ExitDrying::class, 'drying_reception_id');
    }


    public function drying_closures()
    {
        return $this->hasMany(DryingClosure::class, 'drying_reception_id');
    }


    public function bale_compositions()
    {
        return $this->hasMany(BaleComposition::class, 'drying_reception_id');
    }
}
