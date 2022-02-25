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
    protected $apikey = '3741b78df9262be12be380987d275c6f';

    //Gets all clients from the 20Bananas API and renders them in a view
    public function getVbClientes() {
        $response = Cliente::get($this->apikey);

        return view('20bananas.clientes', [
            'response' => $response,
        ]);
    }

    //Gets all orders from the 20Bananas API and renders them in a view
    public function getVbPedidos() {
        $dateParam = "2022-02-08";
        $response = Pedido::get($this->apikey, $dateParam);

        return view('20bananas.pedidos', [
            'response' => $response,
        ]);
    }

    //Gets all products from the 20Bananas API and renders them in a view
    public function getVbProductos() {
        $response = Producto::get($this->apikey);

        return view('20bananas.productos', [
            'response' => $response,
        ]);
    }

    //Gets all clients from the Factusol API and renders them in a view
    public function getFactusolClientes() {
        $token = FactusolApi::getBearerToken();
        $response = FactusolCliente::get($token);

        return view('factusol.clientes', [
            'response' => $response,
        ]);
    }

    //Gets all products from the Factusol API and renders them in a view
    public function getFactusolProductos() {
        $token = FactusolApi::getBearerToken();
        $response = FactusolProducto::get($token);

        return view('factusol.productos', [
            'response' => $response,
        ]);
    }

    //Gets all clients from the Factusol API and posts them to the 20Bananas database
    public function postVbClientes() {
        $apikey = '3741b78df9262be12be380987d275c6f';
        // $apikey = '';
        $token = FactusolApi::getBearerToken();
        $body = FactusolCliente::get($token);
        // $body = '';

        $response = Cliente::post($apikey, $body);

        if ($response == false) {
            return redirect()->route('20bananas.clientes')->with('error', 'APIkey or body was empty');    
        }

        return redirect()->route('20bananas.clientes')->with('success', 'Clients updated successfully');
    }

    public function postVbClientesView() {
        return view('20bananas.post.clientes');
    }
}
