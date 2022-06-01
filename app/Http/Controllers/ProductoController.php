<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FactusolApi;
use App\Models\FactusolProducto;
use App\Models\Producto;
use App\Models\ProductoHeader;
use App\Models\ClienteCredential;
use Illuminate\Support\Facades\Http;



class ProductoController extends Controller
{
    protected $apikey = '3741b78df9262be12be380987d275c6f';

    //Gets all products from the 20Bananas API and renders them in a view
    public function index() {
        $productos = Producto::all();
        $header = ProductoHeader::first();

        $credentials = ClienteCredential::all();

        if ($header != null) {
            $statusCode = intval($header->statusCode);
        } else {
            $statusCode = null;
        }

        return view('20bananas.productos', [
            'response' => $productos,
            'header' => $header,
            'statusCode' => $statusCode,
            'credentials' => $credentials
        ]);
    }

    //Gets all Products from the 20Bananas API and renders them in a view
    public function get(Request $request) {
        $response = Producto::get($request->apikey);

        if ($response == 'Unauthorized') {
            return redirect()->route('20bananas.clientes.index')->with('error', 'You are Unauthorized');
        }

        if (ProductoHeader::exists()) {
            ProductoHeader::truncate();
        }

        $productoHeader = new ProductoHeader;
        $productoHeader->status = $response['response'];
        $productoHeader->statusCode = $response->getStatusCode();
        $productoHeader->save();

        if (Producto::exists()) {
            Producto::truncate();
        }

        foreach ($response['records'] as $value) {
            $producto = new Producto;
            $producto->activo = $value['activo'];
            $producto->referencia = $value['referencia'];
            $producto->nombre = $value['nombre'];
            $producto->subfamilia = $value['subfamilia'];
            $producto->familia = $value['familia'];
            $producto->precio = $value['precio'];
            $producto->unidad = $value['unidad'];
            $producto->udsindependientes = $value['udsindependientes'];
            $producto->unidadesxbulto = $value['unidadesxbulto'];
            $producto->unidadbulto = $value['unidadbulto'];
            $producto->unidadesxbulto2 = $value['unidadesxbulto2'];
            $producto->unidadbulto2 = $value['unidadbulto2'];
            $producto->vendounidad = $value['vendounidad'];
            $producto->vendobulto = $value['vendobulto'];
            $producto->vendobulto2 = $value['vendobulto2'];
            $producto->descripcion = $value['descripcion'];
            $producto->tags = $value['tags'];
            $producto->codigosbarra = $value['codigosbarra'];
            $producto->stock = $value['stock'];
            $producto->foto = $value['foto'];
            $producto->save();
        }

        return redirect()->route('20bananas.productos.index');
    }

    //Gets all Products from the Factusol API and posts them to the 20Bananas database
    public function post($credential = null) {

        if (is_null($credential)) {
            $credential = ClienteCredential::where('name', request()->credential)->first();
        } else {
            $credential = $credential;
        }

        $token = FactusolApi::getBearerToken($credential);
        $body = FactusolProducto::get($token);
        $filtered = Producto::filter($body, $token);
        $response = Producto::post($credential->apikey, $filtered);

        if ($response == false) {
            return redirect()->route('20bananas.productos.index')->with('error', 'APIkey or body was incorrect');    
        }

        return redirect()->route('20bananas.productos.index')->with('success', 'Products updated successfully');
    }
}
