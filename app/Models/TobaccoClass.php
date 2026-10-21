<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TobaccoClass extends Model
{
    protected $fillable = [
        'code',
        'nombre',
        'type',
        'quality_status',
        'size'
    ];

    public function drawer_entrys()
    {
        return $this->hasMany(DrawerEntry::class, 'tobacco_classes_id');
    }

    public function exit_dryings()
    {
        return $this->hasMany(ExitDrying::class, 'tobacco_classes_id');
    }

    public function bale_dryings()
    {
        return $this->hasMany(BaleDrying::class, 'tobacco_classes_id');
    }
}
