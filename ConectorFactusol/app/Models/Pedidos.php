<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Pedidos extends Model
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

    /**
    * Gets all order data from 20Banana's API
    * 
    * @param string    $apikey contains the apikey for authenticating the API
    * @param string    $dateParam contains the order date in yyyy-mm-dd order
    * @return object   $response order data
    */
    public function get($apikey, $dateParam)
    {

        // dd($dateParam);
        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'apikey' => $apikey
        ])->get('https://api.20bananas.com/v2.3.php/pedidos/' . $dateParam);

        return $response;
    }

    public function post() 
    {

    }
}
