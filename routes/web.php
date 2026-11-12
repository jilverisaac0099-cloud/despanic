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
use App\Http\Middleware\CheckRole;

// 1. La raíz redirige al login
Route::get('/', function () {
    return redirect()->route('login');
});

// RUTA PARA CREAR AUTOMÁTICAMENTE LOS 6 USUARIOS Y ROLES DE LA FÁBRICA
Route::get('/crear-usuarios', function () {
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    $cuentas = [
        ['name' => 'Admin General',          'email' => 'admin@despanic.com',      'role' => 'Administrador General'],
        ['name' => 'Encargado de Recepción',  'email' => 'recepcion@despanic.com',  'role' => 'Encargado Recepcion'],
        ['name' => 'Encargado de Pilones',    'email' => 'pilones@despanic.com',    'role' => 'Encargado Pilones'],
        ['name' => 'Encargado de Despalillo', 'email' => 'despalillo@despanic.com', 'role' => 'Encargado Despalillo'],
        ['name' => 'Encargado de Secadero',   'email' => 'secadero@despanic.com',   'role' => 'Encargado Secadero'],
        ['name' => 'Encargado de Pacas',      'email' => 'pacas@despanic.com',      'role' => 'Encargado Pacas'],
    ];

    foreach ($cuentas as $datos) {
        $rol = \Spatie\Permission\Models\Role::firstOrCreate(['name' => $datos['role']]);

        $usuario = \App\Models\User::updateOrCreate(
            ['email' => $datos['email']],
            [
                'name'              => $datos['name'],
                'password'          => 'password123',
                'email_verified_at' => now(),
            ]
        );

        $usuario->syncRoles([$rol]);
    }

    return '<div style="font-family:sans-serif; max-width:500px; margin:50px auto; padding:25px; border:1px solid #ccc; border-radius:10px; text-align:center;">
                <h2 style="color:#16a34a;">¡Usuarios y roles creados con éxito!</h2>
                <p>Contraseña para todas las cuentas: <b>password123</b></p>
                <ul style="text-align:left; line-height:1.8;">
                    <li><b>Admin:</b> admin@despanic.com</li>
                    <li><b>Recepción:</b> recepcion@despanic.com</li>
                    <li><b>Pilones:</b> pilones@despanic.com</li>
                    <li><b>Despalillo:</b> despalillo@despanic.com</li>
                    <li><b>Secadero:</b> secadero@despanic.com</li>
                    <li><b>Pacas:</b> pacas@despanic.com</li>
                </ul>
                <br>
                <a href="/login" style="display:inline-block; padding:12px 24px; background:#2563eb; color:white; text-decoration:none; border-radius:6px; font-weight:bold;">Ir a Iniciar Sesión</a>
            </div>';
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
    Route::middleware([CheckRole::class . ':Administrador General,Encargado Recepcion'])->group(function () {
  Route::get('/reception-menu', function () {
            return view('receptions.menu');
        })->name('receptions.menu');


        Route::resource('lots_receptions', LotsReceptionController::class);
        Route::resource('lots_details', LotsDetailController::class);
    });

    // ==========================================
    // ÁREA 2: PILONES / FERMENTACIÓN
    // ==========================================
    Route::middleware([CheckRole::class . ':Administrador General,Encargado Pilones'])->group(function () {
        Route::get('/pilons-menu', function () {
            return view('menu.pilons');
        })->name('pilons.menu');

        Route::resource('pilons', PilonController::class);
        Route::resource('pilon_origins', PilonOriginController::class);
        Route::resource('events', EventController::class);
        Route::resource('temperatures', TemperatureController::class);
    });

    // ==========================================
    // ÁREA 3: DESPALILLO
    // ==========================================
    Route::middleware([CheckRole::class . ':Administrador General,Encargado Despalillo'])->group(function () {
        Route::get('/destemmings-menu', function () {
            return view('menu.destemmings');
        })->name('destemmings.menu');

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
    Route::middleware([CheckRole::class . ':Administrador General,Encargado Secadero'])->group(function () {
        Route::get('/dryings-menu', function () {
            return view('menu.dryings');
        })->name('dryings.menu');

        Route::resource('drying_receptions', DryingReceptionController::class);
        Route::resource('drawers_entrys', DrawersEntryController::class);
        Route::resource('oven_hornos', OvenHornoController::class);
        Route::resource('exit_dryings', ExitDryingController::class);
        Route::resource('drying_closures', DryingClosureController::class);
    });

    // ==========================================
    // ÁREA 5: PACAS
    // ==========================================
    Route::middleware([CheckRole::class . ':Administrador General,Encargado Pacas'])->group(function () {
        Route::get('/bales-menu', function () {
            return view('menu.bales');
        })->name('bales.menu');

        Route::resource('bale_dryings', BaleDryingController::class);
        Route::resource('bale_compositions', BaleCompositionController::class);
        Route::resource('bale_packagings', BalePackagingController::class);
    });

  Route::get('/dashboard', function () {
    $actividades = \App\Models\Actividad::latest()->take(5)->get();
    return view('dashboard', compact('actividades'));
})->middleware(['auth', 'verified'])->name('dashboard');
 });

// 3. Rutas de autenticación de Breeze
require __DIR__.'/auth.php';


