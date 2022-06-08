<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\ClienteHeader;
use App\Models\FactusolApi;
use App\Models\FactusolCliente;
use App\Models\ClienteCredential;

class ClienteController extends Controller
{
    protected $apikey = '3741b78df9262be12be380987d275c6f';

    public static function index() {
        $clients = Cliente::all();
        $header = ClienteHeader::first();

        $credentials = ClienteCredential::all();

        if ($header != null) {
            $statusCode = intval($header->statusCode);
        } else {
            $statusCode = null;
        }

        return view('20bananas.clientes', [
            'response' => $clients,
            'header' => $header,
            'statusCode' => $statusCode,
            'credentials' => $credentials
        ]);   
    }

    //Gets all clients from the 20Bananas API and renders them in a view
    public static function get(Request $request) {
        $response = Cliente::get($request->apikey);

        if ($response == 'Unauthorized') {
            return redirect()->route('20bananas.clientes.index')->with('error', 'You are Unauthorized');
        }
        
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

    /** 
     *  Gets all clients from the Factusol API and posts them to the 20Bananas database
     *  @param $credential containing all client credential information
     *  @return view with success or error message
     */
    public static function post($credential = null) {
        
        if (is_null($credential)) {
            $credential = ClienteCredential::where('name', request()->credential)->first();
        } else {
            $credential = $credential;
        }

        $token = FactusolApi::getBearerToken($credential);
        $body = FactusolCliente::get($token);
        $filtered = Cliente::filter($body);

        $response = Cliente::post($credential->apikey, $filtered);

        if ($response == false) {
            return redirect()->route('20bananas.clientes.index')->with('error', 'APIkey or body was incorrect');    
        }

        return redirect()->route('20bananas.clientes.index')->with('success', 'Clients updated successfully');
    }
}
