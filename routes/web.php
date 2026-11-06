<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BaleCompositionController;
use App\Http\Controllers\BaleDryingController;
use App\Http\Controllers\BalePackagingController;
use App\Http\Controllers\DestemmingClousureController;
use App\Http\Controllers\DestemmingDeliveryController;
use App\Http\Controllers\DestemmingDrawerController;
use App\Http\Controllers\DestemmingPreparationController;
use App\Http\Controllers\DetailedDestemmingController;
use App\Http\Controllers\DrawersEntryController;
use App\Http\Controllers\DryingClosureController;
use App\Http\Controllers\DryingReceptionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExitDryingController;
use App\Http\Controllers\LotsDetailController;
use App\Http\Controllers\LotsReceptionController;
use App\Http\Controllers\OvenHornoController;
use App\Http\Controllers\PilonController;
use App\Http\Controllers\PilonOriginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemperatureController;
use App\Http\Controllers\TobaccoClassController;
use App\Http\Controllers\VeinDestemmingController;
use Spatie\Permission\Middleware\RoleMiddleware;

// 1. La raíz redirige al login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Grupo general autenticado
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ==========================================
    // ÁREA 1: RECEPCIÓN DE MATERIA PRIMA
    // ==========================================
    Route::middleware([RoleMiddleware::class . ':Administrador General|Encargado Recepcion'])->group(function () {
        // Vista de submenú para elegir entre lotes y detalles
        Route::get('/reception-menu', function () {
            return view('receptions.menu');
        })->name('receptions.menu');

        // Recursos individuales
        Route::resource('lots_receptions', LotsReceptionController::class);
        Route::resource('lots_details', LotsDetailController::class);
    });

    // ==========================================
    // ÁREA 2: PILONES / FERMENTACIÓN
    // ==========================================
    Route::middleware([RoleMiddleware::class . ':Administrador General|Encargado Pilones'])->group(function () {
        Route::resource('pilons', PilonController::class);
        Route::resource('pilon_origins', PilonOriginController::class);
        Route::resource('events', EventController::class);
        Route::resource('temperatures', TemperatureController::class);
    });

    // ==========================================
    // ÁREA 3: DESPALILLO
    // ==========================================
    Route::middleware([RoleMiddleware::class . ':Administrador General|Encargado Despalillo'])->group(function () {
        Route::resource('destemming_preparations', DestemmingPreparationController::class);
        Route::resource('employees', EmployeeController::class);
        Route::resource('destemming_deliveries', DestemmingDeliveryController::class);
        Route::resource('tobacco_classes', TobaccoClassController::class);
        Route::resource('detailed_destemmings', DetailedDestemmingController::class);
        Route::resource('destemming_drawers', DestemmingDrawerController::class);
        Route::resource('vein_destemmings', VeinDestemmingController::class);
        Route::resource('destemming_closures', DestemmingClousureController::class);
    });

    // ==========================================
    // ÁREA 4: SECADERO
    // ==========================================
    Route::middleware([RoleMiddleware::class . ':Administrador General|Encargado Secadero'])->group(function () {
        Route::resource('drying_receptions', DryingReceptionController::class);
        Route::resource('drawers_entrys', DrawersEntryController::class);
        Route::resource('oven_hornos', OvenHornoController::class);
        Route::resource('exit_dryings', ExitDryingController::class);
        Route::resource('drying_closures', DryingClosureController::class);
    });

    // ==========================================
    // ÁREA 5: PACAS
    // ==========================================
    Route::middleware([RoleMiddleware::class . ':Administrador General|Encargado Pacas'])->group(function () {
        Route::resource('bale_dryings', BaleDryingController::class);
        Route::resource('bale_compositions', BaleCompositionController::class);
        Route::resource('bale_packagings', BalePackagingController::class);
    });
});

// 3. Rutas de autenticación de Breeze
require __DIR__.'/auth.php';
