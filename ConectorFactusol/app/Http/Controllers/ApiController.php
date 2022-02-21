<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\FactusolCliente;
use App\Models\FactusolApi;

class ApiController extends Controller
{
    public function vbClientes() {
        $apikey = '3741b78df9262be12be380987d275c6f';
        $response = Cliente::get($apikey)['records'];

        return view('20bananas.clientes', [
            'response' => $response,
        ]);
    }

    public function vbPedidos() {
        $apikey = '3741b78df9262be12be380987d275c6f';
        $dateParam = "2022-02-08";
        $response = Pedido::get($apikey, $dateParam)['records'];

        return view('20bananas.pedidos', [
            'response' => $response,
        ]);
    }

    public function vbProductos() {
        $apikey = '3741b78df9262be12be380987d275c6f';
        $response = Producto::get($apikey)['records'];

        // dd($response);

        return view('20bananas.productos', [
            'response' => $response,
        ]);
    }

    public function factusolClientes() {
        $token = FactusolApi::getBearerToken();
        $response = FactusolCliente::get($token)['resultado'];

        // dd($response);

        // foreach ($response[0] as $head) {
        //     dd($head['columna']);
        // }

        return view('factusol.clientes', [
            'response' => $response,
        ]);
    }
}
