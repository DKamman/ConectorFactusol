<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Oferta;
use App\Models\FactusolApi;
use App\Models\FactusolCliente;
use App\Models\FactusolProducto;
use App\Models\FactusolPedido;
use App\Models\FactusolOferta;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function getVbOfertas() {
        $response = Oferta::get($this->apikey);
        $ofertas = $response['records'];
        $header = $response->headers();
        $status = $response['response'];
        $statusCode = $response->getStatusCode();

        return view('20bananas.ofertas', [
            'response' => $ofertas,
            'header' => $header,
            'status' => $status,
            'statusCode' => $statusCode
        ]);
    }

    //Gets all clients from the Factusol API and renders them in a view
    public function getFactusolClientes() {
        $token = FactusolApi::getBearerToken();
        $response = FactusolCliente::get($token);

        // dd($response[1]);

        $clientes = $response[0];
        $header = $response[1]->headers();
        $status = $response[1]['respuesta'];
        $statusCode = $response[1]->getStatusCode();

        return view('factusol.clientes', [
            'response' => $clientes,
            'header' => $header,
            'status' => $status,
            'statusCode' => $statusCode
        ]);
    }

    //Gets all products from the Factusol API and renders them in a view
    public function getFactusolProductos() {
        $token = FactusolApi::getBearerToken();
        $response = FactusolProducto::get($token);
        $filtered = FactusolProducto::filter($response, $token);

        $productos = $filtered;
        $header = $response->headers();
        $status = $response['respuesta'];
        $statusCode = $response->getStatusCode();

        return view('factusol.productos', [
            'response' => $productos,
            'header' => $header,
            'status' => $status,
            'statusCode' => $statusCode
        ]);
    }

    public function getFactusolOfertas() {
        $token = FactusolApi::getBearerToken();
        $response = FactusolOferta::get($token);
        $filtered = FactusolOferta::filter($response, $token);

        $productos = $filtered;
        $header = $response->headers();
        $status = $response['respuesta'];
        $statusCode = $response->getStatusCode();

        return view('factusol.ofertas', [
            'response' => $filtered,
            'header' => $header,
            'status' => $status,
            'statusCode' => $statusCode
        ]);
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

    public function postVbOfertas() {
        $token = FactusolApi::getBearerToken();
        $body = FactusolOferta::get($token);
        $filtered = FactusolOferta::filter($body, $token);

        $response = Oferta::post($this->apikey, $filtered);
        // dd($response['response']);

        if ($response == false || $response['response'] == "ERROR") {
            return redirect()->route('20bananas.ofertas')->with('error', 'APIkey or body was incorrect');    
        }

        return redirect()->route('20bananas.ofertas')->with('success', 'Offers updated successfully');
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

    public function postVbOfertasView() {
        return view('20bananas.post.ofertas');
    }
}
