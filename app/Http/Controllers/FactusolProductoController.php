<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FactusolApi;
use App\Models\FactusolProducto;
use App\Models\FactusolProductoHeader;
use App\Models\Producto;

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
            'statusCode' => $statusCode
        ]);
    }

    //Gets all products from the Factusol API and renders them in a view
    public function get() {
        $token = FactusolApi::getBearerToken();
        $response = FactusolProducto::get($token);

        if (FactusolProductoHeader::exists()) {
            FactusolProductoHeader::truncate();
        }

        $productoHeader = new FactusolProductoHeader;
        $productoHeader->status = $response['respuesta'];
        $productoHeader->statusCode = $response->getStatusCode();
        $productoHeader->save();

        if (FactusolProducto::exists()) {
            FactusolProducto::truncate();
        }

        foreach ($response['resultado'] as $values) {
            $producto = new FactusolProducto;
            foreach ($values as $value) {
                if ($value['columna'] == "CODART") {
                    $producto->CODART = $value['dato'];
                }
                if ($value['columna'] == "EANART") {
                    $producto->EANART = $value['dato'];
                }
                if ($value['columna'] == "EQUART") {
                    $producto->EQUART = $value['dato'];
                }
                if ($value['columna'] == "FAMART") {
                    $producto->FAMART = $value['dato'];
                }
                if ($value['columna'] == "DESART") {
                    $producto->DESART = $value['dato'];
                }
                if ($value['columna'] == "PHAART") {
                    $producto->PHAART = $value['dato'];
                }
                if ($value['columna'] == "PCOART") {
                    $producto->PCOART = $value['dato'];
                }
                if ($value['columna'] == "FALART") {
                    $producto->FALART = $value['dato'];
                }
                if ($value['columna'] == "IMGART") {
                    $producto->IMGART = $value['dato'];
                }
                if ($value['columna'] == "FUMART") {
                    $producto->FUMART = $value['dato'];
                }
                if ($value['columna'] == "CONART") {
                    $producto->CONART = $value['dato'];
                }
                if ($value['columna'] == "ORDART") {
                    $producto->ORDART = $value['dato'];
                }
                if ($value['columna'] == "FAVART") {
                    $producto->FAVART = $value['dato'];
                }
            }
            $producto->save();
        }

        return redirect()->route('factusol.productos.index');
    }
}
