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
use App\Http\Controllers\TemperatureController;
use App\Http\Controllers\TobaccoClassController;
use App\Http\Controllers\VeinDestemmingController;

/*
|--------------------------------------------------------------------------
| Web Routes - Módulo de Gestión de Tabaco
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('bale_compositions', BaleCompositionController::class);
Route::resource('bale_dryings', BaleDryingController::class);
Route::resource('bale_packagings', BalePackagingController::class);
Route::resource('destemming_closures', DestemmingClousureController::class);
Route::resource('destemming_deliveries', DestemmingDeliveryController::class);
Route::resource('destemming_drawers', DestemmingDrawerController::class);
Route::resource('destemming_preparations', DestemmingPreparationController::class);
Route::resource('detailed_destemmings', DetailedDestemmingController::class);
Route::resource('drawers_entrys', DrawersEntryController::class);
Route::resource('drying_closures', DryingClosureController::class);
Route::resource('drying_receptions', DryingReceptionController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('events', EventController::class);
Route::resource('exit_dryings', ExitDryingController::class);
Route::resource('lots_details', LotsDetailController::class);
Route::resource('lots_receptions', LotsReceptionController::class);
Route::resource('oven_hornos', OvenHornoController::class);
Route::resource('pilons', PilonController::class);
Route::resource('pilon_origins', PilonOriginController::class);
Route::resource('temperatures', TemperatureController::class);
Route::resource('tobacco_classes', TobaccoClassController::class);
Route::resource('vein_destemmings', VeinDestemmingController::class);
