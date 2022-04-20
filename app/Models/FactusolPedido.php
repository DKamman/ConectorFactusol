<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class FactusolPedido extends Model
{
    use HasFactory;

    public static $url = "https://api.sdelsol.com/admin/EscribirRegistro";

    public function get($token) {
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

    public function post($token, $body) {
        $data = '{"ejercicio":"2022","tabla":"F_PCL","registro":' . json_encode($body) . '}';

        $response = Http::withOptions([
            'verify' => false,
        ])->withToken($token)->
        withBody(
        $data, 'application/json'
        )->post(FactusolPedido::$url);
    }

    public function filter($response) {
        $pedidos = array();
        $pedido = array();
        $pedidoRecord = array();
        foreach ($response as $record) {
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
            array_push($pedidos, $pedido);
            $pedido = [];
        }
        return $pedidos;
    }
}
