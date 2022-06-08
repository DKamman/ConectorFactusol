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
}
