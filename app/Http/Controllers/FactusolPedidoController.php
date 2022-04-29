<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FactusolApi;
use App\Models\FactusolPedido;
use App\Models\Pedido;
use App\Models\FactusolPedidoHeader;
use App\Models\ClienteCredential;

class FactusolPedidoController extends Controller
{
    protected $apikey = '3741b78df9262be12be380987d275c6f';

    public function index() {
        $pedidos = FactusolPedido::all();
        $header = FactusolPedidoHeader::first();
        if ($header != null) {
            $statusCode = intval($header->statusCode);
        } else {
            $statusCode = null;
        }

        $credentials = ClienteCredential::all();

        return view('factusol.pedidos', [
            'response' => $pedidos,
            'header' => $header,
            'statusCode' => $statusCode,
            'credentials' => $credentials
        ]);
    }

    public function get(Request $request) {
        $name = $request->credential;
        $credential = ClienteCredential::where('name', $name)->first();

        $token = FactusolApi::getBearerToken($credential);
        $response = FactusolPedido::get($token);

        if (FactusolPedidoHeader::exists()) {
            FactusolPedidoHeader::truncate();
        }

        $pedidoHeader = new FactusolPedidoHeader;
        $pedidoHeader->status = $response['respuesta'];
        $pedidoHeader->statusCode = $response->getStatusCode();
        $pedidoHeader->save();

        if (FactusolPedido::exists()) {
            FactusolPedido::truncate();
        }

        foreach ($response['resultado'] as $values) {
            $pedido = new FactusolPedido;
            foreach ($values as $value) {
                if ($value['columna'] == "TIPPCL") {
                    $pedido->TIPPCL = $value['dato'];
                }
                if ($value['columna'] == "CODPCL") {
                    $pedido->CODPCL = $value['dato'];
                }
                if ($value['columna'] == "CNOPCL") {
                    $pedido->CNOPCL = $value['dato'];
                }
                if ($value['columna'] == "TOTPCL") {
                    $pedido->TOTPCL = $value['dato'];
                }
                if ($value['columna'] == "CLIPCL") {
                    $pedido->CLIPCL = $value['dato'];
                }
                if ($value['columna'] == "FECPCL") {
                    $pedido->FECPCL = $value['dato'];
                }
                if ($value['columna'] == "AGEPCL") {
                    $pedido->AGEPCL = $value['dato'];
                }
                if ($value['columna'] == "CEMPCL") {
                    $pedido->CEMPCL = $value['dato'];
                }
            }
            $pedido->save();
        }
        return redirect()->route('factusol.pedidos.index');
    }

    public function post($credential = null) {
        
        if (is_null($credential)) {
            $name = request()->credential;         
            $credential = ClienteCredential::where('name', $name)->first();
        } else {
            $credential = $credential;
        }

        $token = FactusolApi::getBearerToken($credential);
        $body = Pedido::get($credential->apikey)['records'];
        $filtered = FactusolPedido::filter($body);

        foreach ($filtered as $pedido) {
            $response = FactusolPedido::post($token, $pedido);
        }

        foreach ($body as $pedido) {
            $data = array();
            $data['idpedido'] = $pedido['idpedido'];
            $data['integradoERP10'] = '1';

            $response = Pedido::put($credential->apikey, $data);
        }
        return redirect()->route('factusol.pedidos.index')->with('success', 'Pedidos have been updated');
    }
}
