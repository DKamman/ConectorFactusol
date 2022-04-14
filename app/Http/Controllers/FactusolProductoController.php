<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FactusolProductoController extends Controller
{
    public function index() {
        $productos = FactusolProducto::all();
        $header = FactusolProductoHeader::first();
        if ($header != null) {
            $statusCode = intval($header->statusCode);
        } else {
            $statusCode = null;
        }

        return view('factusol.productos', [
            'response' => $productos,
            'header' => $header,
            'status' => $status,
            'statusCode' => $statusCode
        ]);
    }

    //Gets all products from the Factusol API and renders them in a view
    public function get() {
        $token = FactusolApi::getBearerToken();
        $response = FactusolProducto::get($token);
        $filtered = FactusolProducto::filter($response, $token);

        $productos = $filtered;
        $header = $response->headers();
        $status = $response['respuesta'];
        $statusCode = $response->getStatusCode();
    }
}
