<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\FactusolClienteController;
use App\Http\Controllers\FactusolPedidoController;

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

//20Bananas
//View routes 20 Bananas
Route::get('/20bananas/clientes', [ClienteController::class, 'index'])->middleware(['auth'])->name('20bananas.clientes.index');
Route::get('/20bananas/productos', [ProductoController::class, 'index'])->middleware(['auth'])->name('20bananas.productos.index');
Route::get('/20bananas/pedidos', [PedidoController::class, 'index'])->middleware(['auth'])->name('20bananas.pedidos.index');
Route::get('/20bananas/ofertas', [OfertaController::class, 'index'])->middleware(['auth'])->name('20bananas.ofertas.index');

//GET Debug Routes for 20 Bananas
Route::get('/20bananas/pedidos/getdebug', [PedidoController::class, 'getDebug'])->middleware(['auth'])->name('20bananas.pedidos.getdebug');

//GET routes for 20 Bananas
Route::get('/20bananas/clientes/get', [ClienteController::class, 'get'])->middleware(['auth'])->name('20bananas.clientes.get');
Route::get('/20bananas/pedidos/get', [PedidoController::class, 'get'])->middleware(['auth'])->name('20bananas.pedidos.get');
Route::get('/20bananas/productos/get', [ProductoController::class, 'get'])->middleware(['auth'])->name('20bananas.productos.get');
Route::get('/20bananas/ofertas/get', [ApiController::class, 'getVbOfertas'])->middleware(['auth'])->name('20bananas.ofertas');

//POST routes For 20Bananas
Route::get('/20bananas/clientes/post', [ClienteController::class, 'post'])->middleware(['auth'])->name('20bananas.clientes.post');
Route::get('/20bananas/productos/post', [ProductoController::class, 'post'])->middleware(['auth'])->name('20bananas.productos.post');
Route::get('/20bananas/pedidos/post', [PedidoController::class, 'post'])->middleware(['auth'])->name('20bananas.pedidos.post');
Route::get('/20bananas/ofertas/post', [ApiController::class, 'post'])->middleware(['auth'])->name('20bananas.ofertas.post');

//Factusol
//View routes For Factusol
Route::get('/factusol/clientes', [FactusolClienteController::class, 'index'])->middleware(['auth'])->name('factusol.clientes.index');
Route::get('/factusol/productos', [FactusolProductoController::class, 'getFactusolProductos'])->middleware(['auth'])->name('factusol.productos.index');
Route::get('/factusol/pedidos', [FactusolPedidoController::class, 'index'])->middleware(['auth'])->name('factusol.pedidos.index');
Route::get('/factusol/ofertas', [FactusolOfertaController::class, 'getFactusolOfertas'])->middleware(['auth'])->name('factusol.ofertas.index');

//GET Routes For Factusol
Route::get('/factusol/clientes/get', [FactusolClienteController::class, 'get'])->middleware(['auth'])->name('factusol.clientes.get');
Route::get('/factusol/productos/get', [Apicontroller::class, 'getFactusolProductos'])->middleware(['auth'])->name('factusol.productos.get');
Route::get('/factusol/pedidos/get', [FactusolPedidoController::class, 'get'])->middleware(['auth'])->name('factusol.pedidos.get');
Route::get('/factusol/ofertas/get', [Apicontroller::class, 'getFactusolOfertas'])->middleware(['auth'])->name('factusol.ofertas.get');

//POST Routes For Factusol
Route::get('/factusol/pedidos/post', [FactusolPedidoController::class, 'post'])->middleware(['auth'])->name('factusol.pedidos.post');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
