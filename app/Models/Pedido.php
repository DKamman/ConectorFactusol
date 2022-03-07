<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Pedido extends Model
{
    use HasFactory;
    protected $idpedido;
    protected $desdedispositivo;
    protected $codcliente;
    protected $nombrecliente;
    protected $fecha;
    protected $hora;
    protected $envioemail;
    protected $totalimporte;
    protected $enviado10;
    protected $servido10;
    protected $integradoERP10;
    protected $codcomercial;
    protected $clienteParticular;
    protected $comentarios;
    protected $fechaEntrega;
    protected $numepedidoCliente;
    protected $enviadoPorComercial;
    protected $productos;

    public static $url = 'https://api.20bananas.com/v2.3.php/pedidos/';

    /**
    * Gets all order data from 20Banana's API
    * 
    * @param string    $apikey contains the apikey for authenticating the API
    * @param string    $dateParam contains the order date in yyyy-mm-dd order
    * @return array   $response['records'] order data
    */
    public function get($apikey, $dateParam)
    {
        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'apikey' => $apikey
        ])->get(Pedido::$url . $dateParam);

        if ($response['response'] == 'ERROR') {
            return 'Unauthorized';
        }
        return $response['records'];
    }

    public function filter($response) {

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

    public function post() 
    {

    }
}
