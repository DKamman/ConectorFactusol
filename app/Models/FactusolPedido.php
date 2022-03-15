<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class FactusolPedido extends Model
{
    use HasFactory;
    protected static $url = "https://api.sdelsol.com/admin/EscribirRegistro";

    public static function post($token, $body) {
        {
            $response = Http::withOptions([
                'verify' => false,
            ])->withToken($token)->
            withBody(
                `
                    "ejercicio":"2022",
                    "tabla":"F_PCL",
                `, 'application/json'
            )->post(FactusolPedido::$url, $body);
    
            dd($response['respuesta']);
        }
    }

    public static function filter($response) {
        $columnKeys =[ 
            'idpedido', 
            'desdedispositivo', 
            'codcliente', 
            'nombrecliente', 
            'fecha', 
            'hora', 
            'envioemail', 
            'totalimporte', 
            'enviado10', 
            'servido10', 
            'integradoERP10',
            'codcomercial', 
            'clienteParticular', 
            'comentarios', 
            'fechaEntrega', 
            'numpedidoCliente', 
            'rutaReparto', 
            'enviadoPorComercial',
            'productos'
        ];

        $orderArray = array();
        $order = array();
        $orderColumna = array();
        $i = 0;

        foreach ($response as $records) {
            foreach ($records as $record) {
                $orderColumna['columna'] = $columnKeys[$i];
                $orderColumna['dato'] = $record;
                array_push($order, $orderColumna);
                $i++;
            }
            array_push($orderArray, $order);
            $i = 0;
            $order = array();
        }

        return $orderArray;
    }
}
