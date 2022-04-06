<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\ProductoHeader;

class ProductoController extends Controller
{
    protected $apikey = '3741b78df9262be12be380987d275c6f';

    //Gets all products from the 20Bananas API and renders them in a view
    public function index() {
        $productos = Producto::all();
        $header = ProductoHeader::first();
        if ($header != null) {
            $statusCode = intval($header->statusCode);
        } else {
            $statusCode = null;
        }

        return view('20bananas.productos', [
            'response' => $productos,
            'header' => $header,
            'statusCode' => $statusCode
        ]);
    }

    //Gets all Products from the 20Bananas API and renders them in a view
    public function get() {
        $response = Producto::get($this->apikey);

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
}
