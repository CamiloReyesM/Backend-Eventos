<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\UsuarioPermisoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoEventoController;
use App\Http\Controllers\OrdenCompraController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tipousuarios/datos', [TipoUsuarioController::class, 'getData']);
Route::get('/tipousuarios/datosById/{id}', [TipoUsuarioController::class, 'getTipoUsuarioById']);
Route::post('/tipousuarios/save', [TipoUsuarioController::class, 'save']);
Route::put('/tipousuarios/update/{id}', [TipoUsuarioController::class, 'update']);
Route::delete('/tipousuarios/delete/{id}', [TipoUsuarioController::class, 'delete']);

Route::get('/cargos/datos', [CargoController::class, 'getData']);
Route::get('/cargos/datosById/{id}', [CargoController::class, 'getCargoById']);
Route::post('/cargos/save', [CargoController::class, 'save']);
Route::put('/cargos/update/{id}', [CargoController::class, 'update']);
Route::delete('/cargos/delete/{id}', [CargoController::class, 'delete']);

Route::get('/empleados/datos', [EmpleadoController::class, 'getData']);
Route::get('/empleados/datosById/{id}', [EmpleadoController::class, 'getEmpleadoById']);
Route::post('/empleados/save', [EmpleadoController::class, 'save']);
Route::put('/empleados/update/{id}', [EmpleadoController::class, 'update']);
Route::delete('/empleados/delete/{id}', [EmpleadoController::class, 'delete']);

Route::get('/usuarios/datos', [UsuarioController::class, 'getData']);
Route::get('/usuarios/datosById/{id}', [UsuarioController::class, 'getData']);
Route::post('/usuarios/save', [UsuarioController::class, 'save']);
Route::put('/usuarios/update/{id}', [UsuarioController::class, 'update']);
Route::delete('/usuarios/delete/{id}', [UsuarioController::class, 'delete']);

Route::get('/permisos/datos', [PermisoController::class, 'getData']);
Route::post('/permisos/save', [PermisoController::class, 'save']);
Route::put('/permisos/update/{id}', [PermisoController::class, 'update']);
Route::delete('/permisos/delete/{id}', [PermisoController::class, 'delete']);

Route::get('/usuariopermisos/datos', [UsuarioPermisoController::class, 'getData']);
Route::post('/usuariopermisos/save', [UsuarioPermisoController::class, 'save']);
Route::put('/usuariopermisos/update/{id}', [UsuarioPermisoController::class, 'update']);
Route::delete('/usuariopermisos/delete/{id}', [UsuarioPermisoController::class, 'delete']);

Route::get('/proveedores/datos', [ProveedorController::class, 'getData']);
Route::get('/proveedores/datosById/{id}', [ProveedorController::class, 'getProveedorById']);
Route::post('/proveedores/save', [ProveedorController::class, 'save']);
Route::put('/proveedores/update/{id}', [ProveedorController::class, 'update']);
Route::delete('/proveedores/delete/{id}', [ProveedorController::class, 'delete']);

Route::get('/clases/datos', [ClaseController::class, 'getData']);
Route::get('/clases/datosById/{id}', [ClaseController::class, 'getClaseById']);
Route::post('/clases/save', [ClaseController::class, 'save']);
Route::put('/clases/update/{id}', [ClaseController::class, 'update']);
Route::delete('/clases/delete/{id}', [ClaseController::class, 'delete']);

Route::get('/productos/datos', [ProductoController::class, 'getData']);
Route::get('/productos/datosById/{id}', [ProductoController::class, 'getProductoById']);
Route::post('/productos/save', [ProductoController::class, 'save']);
Route::put('/productos/update/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/delete/{id}', [ProductoController::class, 'delete']);

Route::get('/clientes/datos', [ClienteController::class, 'getData']);
Route::post('/clientes/save', [ClienteController::class, 'save']);
Route::put('/clientes/update/{id}', [ClienteController::class, 'update']);
Route::delete('/clientes/delete/{id}', [ClienteController::class, 'delete']);

Route::get('/productoeventos/datos', [ProductoEventoController::class, 'getData']);
Route::post('/productoeventos/save', [ProductoEventoController::class, 'save']);
Route::put('/productoeventos/update/{id}', [ProductoEventoController::class, 'update']);
Route::delete('/productoeventos/delete/{id}', [ProductoEventoController::class, 'delete']);

Route::get('/ordencompras/datos', [OrdenCompraController::class, 'getData']);
Route::post('/ordencompras/save', [OrdenCompraController::class, 'save']);
Route::put('/ordencompras/update/{id}', [OrdenCompraController::class, 'update']);
Route::delete('/ordencompras/delete/{id}', [OrdenCompraController::class, 'delete']);

Route::get('/eventos/datos', [EventoController::class, 'getData']);
Route::post('/eventos/save', [EventoController::class, 'save']);
Route::put('/eventos/update/{id}', [EventoController::class, 'update']);
Route::delete('/eventos/delete/{id}', [EventoController::class, 'delete']);

Route::get('/facturas/datos', [FacturaController::class, 'getData']);
Route::post('/facturas/save', [FacturaController::class, 'save']);
Route::put('/facturas/update/{id}', [FacturaController::class, 'update']);
Route::delete('/facturas/delete/{id}', [FacturaController::class, 'delete']);
// //También se puede agrupar y se corta un poco el codigo, pero ambos son funcionales

// // Route::cotroller(AutoController::class)->group(function () {
//     // Route::get('/clases/datos','getData');
//     // Route::post('/clases/save','save');
//     // Route::put('/clases/update','update');
//     // Route::delete('/clases/delete','delete');
    

// //     Route::post('login', 'login');
// //     Route::post('register', 'register');
// //     Route::post('logout', 'logout');
// //     Route::post('refresh', 'refresh');
// //     Route::post('me', 'me');
// // });
