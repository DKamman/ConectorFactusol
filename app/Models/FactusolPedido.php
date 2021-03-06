<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class FactusolPedido extends Model
{
    use HasFactory;

    public static $url = "https://api.sdelsol.com/admin/EscribirRegistro";

    public static function get($token) {
        $data = '{"ejercicio":"2022","tabla":"F_PCL","filtro":"CODPCL > 0"}';

        $response = Http::withOptions([
            'verify' => false,
        ])->withToken($token)
        ->withBody(
            "{
                'ejercicio':'2022',
                'tabla':'F_PCL',
                'filtro':'CODPCL > 0'
            }", 'application/json'
        )->post('https://api.sdelsol.com/admin/CargaTabla');

        return $response;
    }

    public static function post($token, $body) {
        unset($body['productos']);
        $data = '{"ejercicio":"2022","tabla":"F_PCL","registro":' . json_encode($body) . '}';

        Http::withOptions([
            'verify' => false,
        ])->withToken($token)->
        withBody(
        $data, 'application/json'
        )->post(FactusolPedido::$url);
    }

    public static function postPedidoProductos($token, $body) {
        $data = '{"ejercicio":"2022","tabla":"F_LPC","registro":' . json_encode($body) . '}';

        $response = Http::withOptions([
            'verify' => false,
        ])->withToken($token)->
        withBody(
        $data, 'application/json'
        )->post(FactusolPedido::$url);
    }

    public static function filter($response) {
        $pedidos = array();
        $pedido = array();
        $pedidoRecord = array();
        $producto = array();
        $productos = array();
        $productoRecord = array();
        $pos = 1;
        foreach ($response as $record) {
            $pedidoRecord['columna'] = 'TIPPCL';
            $pedidoRecord['dato'] = '1';
            array_push($pedido, $pedidoRecord);

            if ($record['idpedido']) {
                $pedidoRecord['columna'] = 'CODPCL';
                $pedidoRecord['dato'] = $record['idpedido'];
                array_push($pedido, $pedidoRecord);
            }
            if ($record['codcliente']) {
                $pedidoRecord['columna'] = 'CLIPCL';
                $pedidoRecord['dato'] = $record['codcliente'];
                array_push($pedido, $pedidoRecord);
            } else {
                $pedidoRecord['columna'] = 'CLIPCL';
                $pedidoRecord['dato'] = '';
                array_push($pedido, $pedidoRecord);
            }
            if ($record['nombrecliente']) {
                $pedidoRecord['columna'] = 'CNOPCL';
                $pedidoRecord['dato'] = $record['nombrecliente'];
                array_push($pedido, $pedidoRecord);
            }
            if ($record['fecha']) {
                $pedidoRecord['columna'] = 'FECPCL';
                $pedidoRecord['dato'] = $record['fecha'];
                array_push($pedido, $pedidoRecord);
            }
            if ($record['envioemail']) {
                $pedidoRecord['columna'] = 'CEMPCL';
                $pedidoRecord['dato'] = $record['envioemail'];
                array_push($pedido, $pedidoRecord);
            }
            if ($record['totalimporte']) {
                $pedidoRecord['columna'] = 'TOTPCL';
                $pedidoRecord['dato'] = $record['totalimporte'];
                array_push($pedido, $pedidoRecord);
            }
            if ($record['productos']) {
                foreach($record['productos'] as $article) {
                    $totPrecio = $article['cantidad'] * $article['precio'];

                    $productoRecord['columna'] = 'CODLPC';
                    $productoRecord['dato'] = $record['idpedido'];
                    array_push($producto, $productoRecord);

                    if($article['referencia']) {
                        $productoRecord['columna'] = 'ARTLPC';
                        $productoRecord['dato'] = $article['referencia'];
                        array_push($producto, $productoRecord);
                    }
                    if($article['nombre']) {
                        $productoRecord['columna'] = 'DESLPC';
                        $productoRecord['dato'] = $article['nombre'];
                        array_push($producto, $productoRecord);
                    }
                    if($article['cantidad']) {
                        $productoRecord['columna'] = 'CANLPC';
                        $productoRecord['dato'] = $article['cantidad'];
                        array_push($producto, $productoRecord);
                    }
                    if($article['precio']) {
                        $productoRecord['columna'] = 'PRELPC';
                        $productoRecord['dato'] = $article['precio'];
                        array_push($producto, $productoRecord);
                    } else {
                        $productoRecord['columna'] = 'PRELPC';
                        $productoRecord['dato'] = 0;
                        array_push($producto, $productoRecord);
                    }

                    $productoRecord['columna'] = 'TOTLPC';
                    $productoRecord['dato'] = $totPrecio;
                    array_push($producto, $productoRecord);

                    $productoRecord['columna'] = 'POSLPC';
                    $productoRecord['dato'] = $pos;
                    array_push($producto, $productoRecord);
                    
                    array_push($productos, $producto);
                    $producto = [];
                    $pos++;
                }
                $pedido['productos'] = $productos;
                $productos = [];
                $pos = 1;
            }
            array_push($pedidos, $pedido);
            $pedido = [];
        }
        return $pedidos;
    }
}
