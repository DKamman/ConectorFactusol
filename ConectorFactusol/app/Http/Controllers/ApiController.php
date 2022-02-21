<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Clientes;
use App\Models\Productos;
use App\Models\Pedidos;

class ApiController extends Controller
{
    public function vbClientes() {
        $apikey = '3741b78df9262be12be380987d275c6f';
        $response = Clientes::get($apikey)['records'];

        return view('20bananas.clientes', [
            'response' => $response,
        ]);
    }

    public function vbPedidos() {
        $apikey = '3741b78df9262be12be380987d275c6f';
        $dateParam = "2022-02-08";
        $response = Pedidos::get($apikey, $dateParam)['records'];

        return view('20bananas.pedidos', [
            'response' => $response,
        ]);
    }

    public function vbProductos() {
        $apikey = '3741b78df9262be12be380987d275c6f';
        $response = Productos::get($apikey)['records'];

        // dd($response);

        return view('20bananas.productos', [
            'response' => $response,
        ]);
    }
}
