<?php

// Rutas de empleados

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\UsuariosClientesController;
use App\Http\Controllers\PeticionController;

// Rutas de clientes

use App\Http\Controllers\LoginCliController;
use App\Http\Controllers\PerfilCliController;
use App\Http\Controllers\ServiciosCliController;
use App\Http\Controllers\CanlendarioCliController;
use App\Http\Controllers\PeticionCliController;

/*



Route::get('/', function () {
    return view('welcome');
});
*/
//   Rutas de empleados
/*   Rutas de login y registro  */

Route::view('/', "login")->name('login');
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
Route::get('/calendario', [EventosController::class, 'eventos_calendario'])->middleware('auth')->name('calendario');

/*   Rutas del modulo ingresos  */
Route::get('/ingresos', [IngresosController::class, 'index'])->middleware('auth')->name('ingresos.index');
Route::get('/ingresos/export-pdf', [IngresosController::class, 'exportPdf'])->middleware('auth')->name('ingresos.exportPdf');

/*   Rutas del modulo de editar perfil  */
Route::get('/perfil/editar', [PerfilController::class, 'edit'])->middleware('auth')->name('perfil.edit');
Route::put('/perfil', [PerfilController::class, 'update'])->middleware('auth')->name('perfil.update');

/*   Rutas del modulo de servicios  */
Route::resource('servicios', ServiciosController::class)->middleware('auth');

/*   Rutas del modulo de usuarios de clientes  */
Route::resource('usuarios', UsuariosClientesController::class)->middleware('auth')->names([
    'index' => 'perfiles_index',
    'edit' => 'perfiles_edit',
    'update' => 'update_user',
    'destroy' => 'destroy_user'
]);

/*   Rutas del modulo de peticiones de clientes  */
Route::get('/empleados/peticiones', [PeticionController::class, 'index'])->middleware('auth')->name('peticiones.index.empleado');
Route::get('/eventos/aprobar/{peticion}', [PeticionController::class, 'aprobarSolicitud'])->middleware('auth')->name('eventos.aprobar');
Route::resource('aprobaciones', PeticionController::class)->middleware('auth');
Route::delete('/solicitudes/{peticion}/eliminar', [PeticionController::class, 'eliminarSolicitud'])->name('solicitudes.eliminar');
Route::put('/solicitudes/{peticion}/rechazar', [PeticionController::class, 'rechazar'])->name('solicitudes.rechazar');




/*   Rutas de clientes  */
/*   Rutas de login y registro  */
Route::view('/login-cli', "clientes.login-cli")->name('login-cli');
Route::view('/registro-cli', "clientes.register-cli")->name('registro-cli');
Route::view('/inicio-cli', "clientes.inicio-cli")->middleware('client.auth')->name('inicio-cli');

Route::post('/validar-registro-cli', [LoginCliController::class, 'register'])->name('validar-registro-cli');
Route::post('/inicia-sesion-cli', [LoginCliController::class, 'login'])->name('inicia-sesion-cli');
Route::get('/logout-cli', [LoginCliController::class, 'logout'])->name('logout-cli');

/*   Rutas del modulo de perfil  */
Route::get('/perfil-cli/editar', [PerfilCliController::class, 'edit'])->middleware('client.auth')->name('perfil-cli.edit');
Route::put('/perfil-cli', [PerfilCliController::class, 'update'])->middleware('client.auth')->name('perfil-cli.update');

/*   Rutas de modulo de informqcion del estudio  */
Route::view('/informacion_estudio', "clientes.informacion_estudio")->name('informacion_estudio');

/*   Rutas del modulo de servicios  */
Route::resource('servicios-cli', ServiciosCliController::class)->middleware('client.auth');

/*   Rutas del modulo de calendario y peticiones  */
Route::get('/calendario-cliente', [CanlendarioCliController::class, 'calendarioCliente'])->middleware('client.auth')->name('calendario.cliente');
Route::resource('peticiones', PeticionCliController::class)->parameters(['peticiones' => 'peticion'])->middleware('client.auth');
Route::get('/mis-peticiones', [PeticionCliController::class, 'index'])->middleware('client.auth')->name('peticiones.index');
Route::get('/servicios/{id}/precio', [PeticionCliController::class, 'obtenerPrecio']);
Route::get('/peticiones/{id}/ticket', [PeticionCliController::class, 'descargarTicket'])->name('peticiones.ticket');
Route::get('/peticiones/{id}/pagar', [PeticionCliController::class, 'mostrarPago'])->name('peticiones.pagar');
Route::post('/peticiones/calcular-cotizacion', [PeticionCliController::class, 'calcularCotizacion'])->name('peticiones.calcular-cotizacion');

