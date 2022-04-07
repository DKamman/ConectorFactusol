<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FactusolApi;
use App\Models\FactusolCliente;
use App\Models\FactusolClienteHeader;

class FactusolClienteController extends Controller
{
    public function index() {
        $clientes = FactusolCliente::all();
        $header = FactusolClienteHeader::first();
        if ($header != null) {
            $statusCode = intval($header->statusCode);
        } else {
            $statusCode = null;
        }

        return view('factusol.clientes', [
            'response' => $clientes,
            'header' => $header,
            'statusCode' => $statusCode
        ]);
    }

    //Gets all clients from the Factusol API and renders them in a view
    public function get() {
        $token = FactusolApi::getBearerToken();
        $response = FactusolCliente::get($token);

        if (FactusolClienteHeader::exists()) {
            FactusolClienteHeader::truncate();
        }

        $clienteHeader = new FactusolClienteHeader;
        $clienteHeader->status = $response['respuesta'];
        $clienteHeader->statusCode = $response->getStatusCode();
        $clienteHeader->save();

        if (FactusolCliente::exists()) {
            FactusolCliente::truncate();
        }

        foreach ($response['resultado'] as $values) {
            $cliente = new FactusolCliente;
            foreach ($values as $value) {
                if ($value['columna'] == "CODCLI") {
                    $cliente->CODCLI = $value['dato'];
                }
                if ($value['columna'] == "CCOCLI") {
                    $cliente->CCOCLI = $value['dato'];
                }
                if ($value['columna'] == "NIFCLI") {
                    $cliente->NIFCLI = $value['dato'];
                }
                if ($value['columna'] == "NOFCLI") {
                    $cliente->NOFCLI = $value['dato'];
                }
                if ($value['columna'] == "NOCCLI") {
                    $cliente->NOCCLI = $value['dato'];
                }
                if ($value['columna'] == "DOMCLI") {
                    $cliente->DOMCLI = $value['dato'];
                }
                if ($value['columna'] == "POBCLI") {
                    $cliente->POBCLI = $value['dato'];
                }
                if ($value['columna'] == "CPOCLI") {
                    $cliente->CPOCLI = $value['dato'];
                }
                if ($value['columna'] == "PROCLI") {
                    $cliente->PROCLI = $value['dato'];
                }
                if ($value['columna'] == "TELCLI") {
                    $cliente->TELCLI = $value['dato'];
                }
                if ($value['columna'] == "FAXCLI") {
                    $cliente->FAXCLI = $value['dato'];
                }
                if ($value['columna'] == "PCOCLI") {
                    $cliente->PCOCLI = $value['dato'];
                }
                if ($value['columna'] == "AEGCLI") {
                    $cliente->AEGCLI = $value['dato'];
                }
                if ($value['columna'] == "BANCLI") {
                    $cliente->BANCLI = $value['dato'];
                }
                if ($value['columna'] == "ENTCLI") {
                    $cliente->ENTCLI = $value['dato']; 
                }
                if ($value['columna'] == "OFICLI") {
                    $cliente->OFICLI = $value['dato'];
                }
                if ($value['columna'] == "DCOCLI") {
                    $cliente->DCOCLI = $value['dato'];
                }
                if ($value['columna'] == "CUECLI") {
                    $cliente->CUECLI = $value['dato'];
                }
                if ($value['columna'] == "FPACLI") {
                    $cliente->FPACLI = $value['dato'];
                }
                if ($value['columna'] == "FINCLI") {
                    $cliente->FINCLI = $value['dato'];
                }
                if ($value['columna'] == "PPACLI") {
                    $cliente->PPACLI = $value['dato'];
                }
                if ($value['columna'] == "TARCLI") {
                    $cliente->TARCLI = $value['dato'];
                }
                if ($value['columna'] == "DP1CLI") {
                    $cliente->DP1CLI = $value['dato'];
                }
                if ($value['columna'] == "DP2CLI") {
                    $cliente->DP2CLI = $value['dato'];
                }
                if ($value['columna'] == "DP3CLI") {
                    $cliente->DP3CLI = $value['dato'];
                }
                if ($value['columna'] == "TCLCLI") {
                    $cliente->TCLCLI = $value['dato']; 
                }
            }
            $cliente->save();
        }

        return redirect()->route('factusol.clientes.index');
    }

    public function post() {
        //
    }
}