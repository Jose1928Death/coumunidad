<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\VecinoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vecino', VecinoController::class);
Route::resource('Propiedad', PropiedadController::class);

Route::get('facturas/{vecino}', 'App\Http\Controllers\VecinoController@propiedadsVecino')
->name('facturas.vecinospropiedad');

Route::get('facturas/{propiedad}', 'App\Http\Controllers\PropiedadController@vecinosPropiedad')
->name('facturas.propiedadsvecino');

Route::get('facturas1/{propiedad}/create', 'App\Http\Controllers\PropiedadController@createPresupuesto')
    ->name('facturas1.create');
