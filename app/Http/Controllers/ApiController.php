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
use App\Models\FactusolPedido;
use App\Models\FactusolOferta;
use Carbon\Carbon;

class ApiController extends Controller
{   
    protected $dateParam = '';
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
        $response = Pedido::get($this->apikey, $this->dateParam);
        $factusolData = Pedido::filter($response);

        return view('20bananas.pedidos', [
            'response' => $response,
            'factusol' => $factusolData,
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
        $filtered = FactusolProducto::filter($response, $token);

        return view('factusol.productos', [
            'response' => $filtered,
        ]);
    }

    public function getFactusolOfertas() {
        $token = FactusolApi::getBearerToken();
        $response = FactusolOferta::get($token);
        $filtered = FactusolOferta::filter($response, $token);

        return view('factusol.ofertas', [
            'response' => $filtered,
        ]);
    }

    //Gets all clients from the Factusol API and posts them to the 20Bananas database
    public function postVbClientes() {
        $token = FactusolApi::getBearerToken();
        $body = FactusolCliente::get($token);

        $response = Cliente::post($this->apikey, $body);

        if ($response == false) {
            return redirect()->route('20bananas.clientes')->with('error', 'APIkey or body was incorrect');    
        }

        return redirect()->route('20bananas.clientes')->with('success', 'Clients updated successfully');
    }

    //Gets all Products from the Factusol API and posts them to the 20Bananas database
    public function postVbProductos() {
        $token = FactusolApi::getBearerToken();
        $body = FactusolProducto::get($token);
        $filtered = FactusolProducto::filter($body, $token);

        $response = Producto::post($this->apikey, $filtered);

        if ($response == false) {
            return redirect()->route('20bananas.productos')->with('error', 'APIkey or body was incorrect');    
        }

        return redirect()->route('20bananas.productos')->with('success', 'Products updated successfully');
    }

    //Posts all Orders from the 20Bananas API to the Factusol API
    public function postFactusolPedidos() {
        $token = FactusolApi::getBearerToken();
        $response = Pedido::get($this->apikey, $this->dateParam);
        $filtered = FactusolPedido::filter($response);
        $body = [
            [
                "columna"=>"CODPLC",
                "dato"=>"11111"
            ]
        ];

        $posted = FactusolPedido::post($token, $body);
        dd($posted);
    }

    //Renders the POST clientes view to 20 Bananas
    public function postVbClientesView() {
        return view('20bananas.post.clientes');
    }

    //Renders the POST productos view to 20 Bananas
    public function postVbProductosView() {
        return view('20bananas.post.productos');
    }

    //Renderes the POST pedidos view to Factusol
    public function postFactusolPedidosView() {
        return view('factusol.post.pedidos');
    }
}
