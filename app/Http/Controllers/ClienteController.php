<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\ClienteHeader;

class ClienteController extends Controller
{
    protected $apikey = '3741b78df9262be12be380987d275c6f';

    public function index() {
        $clients = Cliente::all();
        $header = ClienteHeader::first();
        if ($header != null) {
            $statusCode = intval($header->statusCode);
        } else {
            $statusCode = null;
        }

        return view('20bananas.clientes', [
            'response' => $clients,
            'header' => $header,
            'statusCode' => $statusCode
        ]);   
    }

    //Gets all clients from the 20Bananas API and renders them in a view
    public function get() {
        $response = Cliente::get($this->apikey);
        
        if (ClienteHeader::exists()) {
            ClienteHeader::truncate();
        }

        $clienteHeader = new ClienteHeader;
        $clienteHeader->status = $response['response'];
        $clienteHeader->statusCode = $response->getStatusCode();
        $clienteHeader->save();

        if (Cliente::exists()) {
            Cliente::truncate();
        }
        
        foreach ($response['records'] as $value) {
            $cliente = new Cliente;
            $cliente->activo = $value['activo'];
            $cliente->codcliente = $value['codcliente'];
            $cliente->codcomercial = $value['codcomercial'];
            $cliente->nombrecliente = $value['nombrecliente'];
            $cliente->diasreparto = $value['diasreparto'];
            $cliente->save();
        }

        return redirect()->route('20bananas.clientes.index');
    }

    //Gets all clients from the Factusol API and posts them to the 20Bananas database
    public function post() {
        // $token = FactusolApi::getBearerToken();
        // $body = FactusolCliente::get($token);

        $response = FactusolCliente::all();
        $header = FactusolClienteHeader::first();

        $response = Cliente::post($this->apikey, $body);

        if ($response == false) {
            return redirect()->route('20bananas.clientes')->with('error', 'APIkey or body was incorrect');    
        }

        return redirect()->route('20bananas.clientes')->with('success', 'Clients updated successfully');
    }
}
