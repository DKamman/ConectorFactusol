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

if ($this->app->environment('production')) {
    URL::forceScheme('https');
}

Route::get('/', function () {
    return view('auth.login');
});

//GET routes for 20 Bananas
Route::get('/20bananas/clientes', [ApiController::class, 'getVbClientes'])->middleware(['auth'])->name('20bananas.clientes');
Route::get('/20bananas/pedidos', [ApiController::class, 'getVbPedidos'])->middleware(['auth'])->name('20bananas.pedidos');
Route::get('/20bananas/productos', [ApiController::class, 'getVbProductos'])->middleware(['auth'])->name('20bananas.productos');

//GET routes for Factusol
Route::get('/factusol/clientes', [Apicontroller::class, 'getFactusolClientes'])->middleware(['auth'])->name('factusol.clientes');
Route::get('/factusol/productos', [Apicontroller::class, 'getFactusolProductos'])->middleware(['auth'])->name('factusol.productos');

//API POST routes
Route::get('/20bananas/postclientes', [ApiController::class, 'postVbClientes'])->middleware(['auth'])->name('20bananas.post.clientes');
Route::get('/20bananas/postproductos', [ApiController::class, 'postVbProductos'])->middleware(['auth'])->name('20bananas.post.productos');
Route::get('/factusol/postpedidos', [ApiController::class, 'postFactusolPedidos'])->middleware(['auth'])->name('factusol.post.pedidos');

//POST view routes
Route::get('/20bananas/postclientesview', [ApiController::class, 'postVbClientesView'])->middleware(['auth'])->name('20bananas.post.clientes.view');
Route::get('/20bananas/postproductosview', [ApiController::class, 'postVbProductosView'])->middleware(['auth'])->name('20bananas.post.productos.view');
Route::get('/factusol/postpedidosview', [ApiController::class, 'postFactusolPedidosView'])->middleware(['auth'])->name('factusol.post.pedidos.view');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
