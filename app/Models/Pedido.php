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
    public static function get($apikey, $dateParam)
    {
        $response = Http::withOptions([
            'verify' => false,
            'proxy' => 'http://izdqtgr5xgbe5z:2h4gpv9haieb5u881mjjf1bio9@eu-west-static-05.quotaguard.com:9293'
        ])->withHeaders([
            'apikey' => $apikey
        ])->get(Pedido::$url . $dateParam);

        if ($response['response'] == 'ERROR') {
            return 'Unauthorized';
        }
        return $response;
    }

    public static function filter() {
        //
    }

    public static function post() 
    {
        //
    }
}
