<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Actividad;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Configurar el idioma de las fechas en español ("hace 5 minutos")
        Carbon::setLocale('es');
        date_default_timezone_set('America/Managua');

        // 2. Mapa de todos tus modelos reales divididos por las 5 áreas
        $modelosPlanta = [
            // Área 1: Recepción
            \App\Models\LotsReception::class         => ['1. Recepción', 'recepción de lote'],
            \App\Models\LotsDetail::class            => ['1. Recepción', 'detalle de lote'],

            // Área 2: Pilones
            \App\Models\Pilon::class                 => ['2. Pilones', 'pilón de fermentación'],
            \App\Models\PilonOrigin::class           => ['2. Pilones', 'origen de pilón'],
            \App\Models\Event::class                 => ['2. Pilones', 'evento o giro de pilón'],
            \App\Models\Temperature::class           => ['2. Pilones', 'control de temperatura'],

            // Área 3: Despalillo
            \App\Models\DestemmingPreparation::class => ['3. Despalillo', 'preparación de despalillo'],
            \App\Models\DestemmingDelivery::class    => ['3. Despalillo', 'entrega de despalillo'],
            \App\Models\DetailedDestemming::class    => ['3. Despalillo', 'despalillo detallado'],
            \App\Models\VeinDestemming::class        => ['3. Despalillo', 'despalillo de vena'],
            \App\Models\DestemmingDrawer::class      => ['3. Despalillo', 'gaveta de despalillo'],
            \App\Models\DestemmingClousure::class    => ['3. Despalillo', 'cierre de despalillo'],
            \App\Models\Employee::class              => ['3. Despalillo', 'operario de planta'],
            \App\Models\TobaccoClass::class          => ['3. Despalillo', 'clase de tabaco'],

            // Área 4: Secadero
            \App\Models\DryingReception::class       => ['4. Secadero', 'recepción en secadero'],
            \App\Models\OvenHorno::class             => ['4. Secadero', 'ingreso a horno'],
            \App\Models\DrawersEntry::class          => ['4. Secadero', 'entrada de gavetas'],
            \App\Models\BaleDrying::class            => ['4. Secadero', 'secado de paca'],
            \App\Models\ExitDrying::class            => ['4. Secadero', 'salida de secadero'],
            \App\Models\DryingClosure::class         => ['4. Secadero', 'cierre de secadero'],

            // Área 5: Pacas
            \App\Models\BaleComposition::class       => ['5. Pacas', 'composición de paca'],
            \App\Models\BalePackaging::class         => ['5. Pacas', 'empaque final de paca'],
        ];

        // 3. Escuchar automáticamente cuando se CREA o ACTUALIZA en cualquiera de esos modelos
        foreach ($modelosPlanta as $modelo => [$area, $nombreModulo]) {
            $modelo::created(function ($registro) use ($area, $nombreModulo) {
                Actividad::registrar(
                    $area,
                    "Registró nuevo {$nombreModulo} (ID: #{$registro->id})."
                );
            });

            $modelo::updated(function ($registro) use ($area, $nombreModulo) {
                Actividad::registrar(
                    $area,
                    "Actualizó {$nombreModulo} (ID: #{$registro->id})."
                );
            });
        }
    }
}
