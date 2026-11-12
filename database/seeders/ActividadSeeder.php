<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actividad;
use Carbon\Carbon;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiamos la tabla primero para no duplicar
        Actividad::truncate();

        // 1. Recepción
        Actividad::create([
            'usuario_nombre' => 'Juan Mendoza',
            'area' => '1. Recepción',
            'descripcion' => 'Registró el ingreso de 120 quintales de tabaco en rama del proveedor "Finca El Esteliano".',
            'created_at' => Carbon::now()->subMinutes(5),
        ]);

        // 2. Pilones
        Actividad::create([
            'usuario_nombre' => 'Admin General',
            'area' => '2. Pilones',
            'descripcion' => 'Inició el giro (volteo) del Pilón #12 para controlar la temperatura (actual: 45°C).',
            'created_at' => Carbon::now()->subMinutes(25),
        ]);

        // 3. Despalillo
        Actividad::create([
            'usuario_nombre' => 'María Leytón',
            'area' => '3. Despalillo',
            'descripcion' => 'Asignó 45 lbs de tabaco variedad Criollo al grupo de despalilladoras "Bloque B".',
            'created_at' => Carbon::now()->subHour(),
        ]);

        // 4. Secadero
        Actividad::create([
            'usuario_nombre' => 'Carlos Peralta',
            'area' => '4. Secadero',
            'descripcion' => 'Cargó 250 sartas de tabaco despalillado en el Horno de Secado #3.',
            'created_at' => Carbon::now()->subHours(2),
        ]);

        // 5. Pacas
        Actividad::create([
            'usuario_nombre' => 'Juan Mendoza',
            'area' => '5. Pacas',
            'descripcion' => 'Prensó y flejó la Paca #084 de tabaco Madurado (Peso: 112 lbs, Clase: Viso).',
            'created_at' => Carbon::now()->subHours(3),
        ]);
    }
}
