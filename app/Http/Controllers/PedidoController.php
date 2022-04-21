<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoHeader;

class PedidoController extends Controller
{
    protected $apikey = '3741b78df9262be12be380987d275c6f';


    public function index() {
        $pedidos = Pedido::all();
        $header = PedidoHeader::first();
        if ($header != null) {
            $statusCode = intval($header->statusCode);
        } else {
            $statusCode = null;
        }

        return view('20bananas.pedidos', [
            'response' => $pedidos,
            'header' => $header,
            'statusCode' => $statusCode
        ]); 
    }

    //Gets all orders from the 20Bananas API and and save them in the database
    public function get() {
        $response = Pedido::get($this->apikey);
        
        if (PedidoHeader::exists()) {
            PedidoHeader::truncate();
        }

        $pedidoHeader = new pedidoHeader;
        $pedidoHeader->status = $response['response'];
        $pedidoHeader->statusCode = $response->getStatusCode();
        $pedidoHeader->save();

        if (Pedido::exists()) {
            Pedido::truncate();
        }

        foreach ($response['records'] as $value) {
            $pedido = new Pedido;
            $pedido->idpedido = $value['idpedido'];
            $pedido->desdedispositivo = $value['desdedispositivo'];
            $pedido->codcliente = $value['codcliente'];
            $pedido->nombrecliente = $value['nombrecliente'];
            $pedido->fecha = $value['fecha'];
            $pedido->hora = $value['hora'];
            $pedido->envioemail = $value['envioemail'];
            $pedido->totalimporte = $value['totalimporte'];
            $pedido->enviado10 = $value['enviado10'];
            $pedido->servido10 = $value['servido10'];
            $pedido->integradoERP10 = $value['integradoERP10'];
            $pedido->codcomercial = $value['codcomercial'];
            $pedido->clienteParticular = $value['clienteParticular'];
            $pedido->comentarios = $value['comentarios'];
            $pedido->fechaEntrega = $value['fechaEntrega'];
            $pedido->numpedidoCliente = $value['numpedidoCliente'];
            $pedido->rutaReparto = $value['rutaReparto'];
            $pedido->enviadoPorComercial = $value['enviadoPorComercial'];
            $pedido->save();
        }
    }

    //Gets all orders from the 20Bananas API and saves them in the database
    //Take a date paramatar so the user can specify to get the pedidos from any date
    public function getDebug(Request $request) {
        $response = Pedido::getDebug($this->apikey, $request->date);
        
        if (PedidoHeader::exists()) {
            PedidoHeader::truncate();
        }

        $pedidoHeader = new pedidoHeader;
        $pedidoHeader->status = $response['response'];
        $pedidoHeader->statusCode = $response->getStatusCode();
        $pedidoHeader->save();

        if (Pedido::exists()) {
            Pedido::truncate();
        }

        foreach ($response['records'] as $value) {
            $pedido = new Pedido;
            $pedido->idpedido = $value['idpedido'];
            $pedido->desdedispositivo = $value['desdedispositivo'];
            $pedido->codcliente = $value['codcliente'];
            $pedido->nombrecliente = $value['nombrecliente'];
            $pedido->fecha = $value['fecha'];
            $pedido->hora = $value['hora'];
            $pedido->envioemail = $value['envioemail'];
            $pedido->totalimporte = $value['totalimporte'];
            $pedido->enviado10 = $value['enviado10'];
            $pedido->servido10 = $value['servido10'];
            $pedido->integradoERP10 = $value['integradoERP10'];
            $pedido->codcomercial = $value['codcomercial'];
            $pedido->clienteParticular = $value['clienteParticular'];
            $pedido->comentarios = $value['comentarios'];
            $pedido->fechaEntrega = $value['fechaEntrega'];
            $pedido->numpedidoCliente = $value['numpedidoCliente'];
            $pedido->rutaReparto = $value['rutaReparto'];
            $pedido->enviadoPorComercial = $value['enviadoPorComercial'];
            $pedido->save();
        }

        return redirect()->route('20bananas.pedidos.index');
    }
}
