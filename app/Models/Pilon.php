<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pilon extends Model
{
protected $fillable = [
        'number',
        'weight',
        'assembly_date',
        'status'
    ];

    public function vein_destemmings()
    {
        return $this->hasMany(VeinDestemming::class);
    }

    public function temperatures()
    {
        return $this->hasMany(Temperature::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function destemming_preparations()
    {
        return $this->hasMany(DestemmingPreparation::class);
    }
}

