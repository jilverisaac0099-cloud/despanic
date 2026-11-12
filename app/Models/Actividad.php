<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividads';

    protected $fillable = [
        'usuario_nombre',
        'area',
        'descripcion',
    ];

    /**
     * Función rápida para registrar una actividad en cualquier parte del sistema.
     * Ejemplo: Actividad::registrar('2. Pilones', 'Inició el giro del Pilón #12');
     */
    public static function registrar($area, $descripcion)
    {
        return self::create([
            'usuario_nombre' => Auth::user()->name ?? 'Sistema',
            'area' => $area,
            'descripcion' => $descripcion,
        ]);
    }
}
