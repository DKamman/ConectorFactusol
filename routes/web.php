<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\FactusolClienteController;

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
//View routes 20 Bananas
Route::get('/20bananas/clientes', [ClienteController::class, 'index'])->middleware(['auth'])->name('20bananas.clientes.index');
Route::get('/20bananas/productos', [ProductoController::class, 'index'])->middleware(['auth'])->name('20bananas.productos.index');
Route::get('/20bananas/pedidos', [PedidoController::class, 'index'])->middleware(['auth'])->name('20bananas.pedidos.index');

//GET routes for 20 Bananas
Route::get('/20bananas/clientes/get', [ClienteController::class, 'get'])->middleware(['auth'])->name('20bananas.clientes.get');
Route::get('/20bananas/pedidos/get', [PedidoController::class, 'get'])->middleware(['auth'])->name('20bananas.pedidos.get');
Route::get('/20bananas/productos/get', [ProductoController::class, 'get'])->middleware(['auth'])->name('20bananas.productos.get');
Route::get('/20bananas/ofertas', [ApiController::class, 'getVbOfertas'])->middleware(['auth'])->name('20bananas.ofertas');

//View routes for Factusol
Route::get('/factusol/clientes/', [FactusolClienteController::class, 'index'])->middleware(['auth'])->name('factusol.clientes.index');

//GET routes for Factusol
Route::get('/factusol/clientes/get', [FactusolClienteController::class, 'get'])->middleware(['auth'])->name('factusol.clientes.get');
Route::get('/factusol/productos', [Apicontroller::class, 'getFactusolProductos'])->middleware(['auth'])->name('factusol.productos');
Route::get('/factusol/ofertas', [Apicontroller::class, 'getFactusolOfertas'])->middleware(['auth'])->name('factusol.ofertas');

//API POST routes
Route::get('/20bananas/postclientes', [ApiController::class, 'postVbClientes'])->middleware(['auth'])->name('20bananas.post.clientes');
Route::get('/20bananas/postproductos', [ApiController::class, 'postVbProductos'])->middleware(['auth'])->name('20bananas.post.productos');
Route::get('/20bananas/postofertas', [ApiController::class, 'postVbOfertas'])->middleware(['auth'])->name('20bananas.post.ofertas');
Route::get('/factusol/postpedidos', [ApiController::class, 'postFactusolPedidos'])->middleware(['auth'])->name('factusol.post.pedidos');

//POST view routes
Route::get('/20bananas/postclientesview', [ApiController::class, 'postVbClientesView'])->middleware(['auth'])->name('20bananas.post.clientes.view');
Route::get('/20bananas/postproductosview', [ApiController::class, 'postVbProductosView'])->middleware(['auth'])->name('20bananas.post.productos.view');
Route::get('/20bananas/postofertasview', [ApiController::class, 'postVbOfertasView'])->middleware(['auth'])->name('20bananas.post.ofertas.view');
Route::get('/factusol/postpedidosview', [ApiController::class, 'postFactusolPedidosView'])->middleware(['auth'])->name('factusol.post.pedidos.view');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
