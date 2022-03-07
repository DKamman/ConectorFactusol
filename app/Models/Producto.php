<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Producto extends Model
{
    use HasFactory;

    protected $referencia;
    protected $nombre;
    protected $activo;
    protected $subfamilia;
    protected $familia;
    protected $precio;
    protected $unidad;
    protected $unidadesxbulto;
    protected $unidadbulto;
    protected $unidadesxbulto2;
    protected $unidadbulto2;
    protected $vendounidad;
    protected $vendobulto;
    protected $vendobulto2;
    protected $descripcion;
    protected $tags;
    protected $foto;

    public static $url = 'https://api.20bananas.com/v2.3.php/productos/';

    /**
    * Gets all product data from 20 Banana's API
    * 
    * @param string    $apikey contains the apikey for authenticating the API
    * @return array   $response['records'] contains product data
    */
    public function get($apikey)
    {
        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'apikey' => $apikey
        ])->get(Producto::$url);

        if ($response['response'] == 'ERROR') {
            return 'Unauthorized';
        }

        return $response['records'];
    }

    /**
     * POSTS all Product data to 20 Banana's API
     * 
     * @param string $apikey contains the apikey for authenticating the API
     * @return array $response contains product data
     */
    public function post($apikey, $body) 
    {
        if (!$apikey) {
            return false;
            exit;
        }

        if (!$body) {
            return false;
            exit;
        }

        Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'apikey' => $apikey,
            'IMSURE' => 'true'
        ])->delete(Producto::$url . '/*');

        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'apikey' => $apikey
        ])->post(Producto::$url, $body);

        return $response;
    }
}