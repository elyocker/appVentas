<?php

use App\Http\Controllers\BodegaController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\InformesController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SolicitarProductosController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\VentasController;

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

Route::resource('', HomeController::class);

Route::get('/dashboard', [Controller::class, 'index']);

Route::resource('registro', RegistroController::class);
// se llama todos los recursos del modulo de categorias
Route::resource('categoria', CategoriasController::class);
// se llama todos los recursos del modulo de empresas
Route::resource('empresas', EmpresaController::class);
// se llama todos los recursos del modulo de sucursales
Route::resource('sucursales', SucursalController::class);
// se llama todos los recursos del modulo de proveedores
Route::resource('proveedores', ProveedorController::class);
// se llama todos los recursos del modulo de bodega
Route::resource('bodega', BodegaController::class);
// se llama todos los recursos del modulo de solicitar
Route::resource('solicitar', SolicitarProductosController::class);
// se llama todos los recursos del modulo de solicitar
Route::resource('ventas', VentasController::class);
// se llama todos los recursos del modulo de informes 
Route::resource('informes', InformesController::class);