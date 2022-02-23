<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\FactusolApi;
use App\Models\FactusolCliente;
use App\Models\FactusolProducto;

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

        return view('20bananas.productos', [
            'response' => $response,
        ]);
    }

    public function factusolClientes() {
        $token = FactusolApi::getBearerToken();
        FactusolCliente::get($token);

        // dd($response);
        // return view('factusol.clientes', [
        //     'response' => $response,
        // ]);
    }

    public function factusolProductos() {
        $token = FactusolApi::getBearerToken();
        $response = FactusolProducto::get($token)['resultado'];

        return view('factusol.productos', [
            'response' => $response,
        ]);
    }

    public function postVbClientes() {
        $apikey = '3741b78df9262be12be380987d275c6f';
        $token = FactusolApi::getBearerToken();
        $body = FactusolCliente::get($token);
        dd($body);

        $response = Cliente::post($apikey, $body);
    }    
}
