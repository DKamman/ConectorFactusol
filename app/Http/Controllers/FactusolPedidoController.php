<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FactusolApi;
use App\Models\FactusolPedido;
use App\Models\FactusolPedidoHeader;

class FactusolPedidoController extends Controller
{
    public function index() {
        $pedidos = FactusolPedido::all();
        $header = FactusolPedidoHeader::first();
        if ($header != null) {
            $statusCode = intval($header->statusCode);
        } else {
            $statusCode = null;
        }

        return view('factusol.pedidos', [
            'response' => $pedidos,
            'header' => $header,
            'statusCode' => $statusCode
        ]);
    }

    public function get() {
        $token = FactusolApi::getBearerToken();
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

    public function post() {
        //
    }
}