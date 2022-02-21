<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
    return view('auth.login');
});

Route::get('/20bananas/clientes', [ApiController::class, 'vbClientes'])->middleware(['auth'])->name('20bananas.clientes');
Route::get('/20bananas/pedidos', [ApiController::class, 'vbPedidos'])->middleware(['auth'])->name('20bananas.pedidos');
Route::get('/20bananas/productos', [ApiController::class, 'vbProductos'])->middleware(['auth'])->name('20bananas.productos');

Route::get('/factusol/clientes', [Apicontroller::class, 'factusolClientes'])->middleware(['auth'])->name('factusol.clientes');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
