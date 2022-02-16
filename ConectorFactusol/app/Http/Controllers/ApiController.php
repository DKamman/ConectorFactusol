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
        $response = Clientes::getClientes($apikey);

        return view('20bananas.clientes', [
            'response' => $response,
        ]);
    }

    public function vbPedidos() {
        $apikey = '3741b78df9262be12be380987d275c6f';
        $response = Pedidos::getPedidos($apikey);

        return view('20bananas.pedidos', [
            'response' => $response,
        ]);
    }

    public function vbProductos() {
        $apikey = '3741b78df9262be12be380987d275c6f';
        $response = Productos::getProductos($apikey);

        return view('20bananas.productos', [
            'response' => $response,
        ]);
    }
}
