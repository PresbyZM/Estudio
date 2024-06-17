<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\IngresosController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\PerfilController;

/*

*/

Route::get('/', function () {
    return view('welcome');
});

/*   Rutas de login y registro  */
Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('registro');

Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/*   la pagina principal  */
Route::view('/inicio', "index")->middleware('auth')->name('inicio');


/*   Rutas del modulo clientes frecuentes  */
Route::resource('clientes', ClientesController::class)->middleware('auth');

/*   Rutas del modulo inventario  */
Route::resource('materiales', MaterialesController::class)->middleware('auth')->parameters(['materiales' => 'material']);

/*   Rutas del modulo agenda  */
Route::resource('eventos', EventosController::class)->middleware('auth')->parameters(['eventos' => 'evento']);
Route::view('/calendario', "eventos_calendario")->middleware('auth')->name('calendario');

/*   Rutas del modulo ingresos  */
Route::get('/ingresos', [IngresosController::class, 'index'])->name('ingresos.index');
Route::get('/ingresos/export-pdf', [IngresosController::class, 'exportPdf'])->name('ingresos.exportPdf');

/*   Rutas del modulo de editar perfil  */
Route::get('/perfil/editar', [PerfilController::class, 'edit'])->name('perfil.edit');
Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update');