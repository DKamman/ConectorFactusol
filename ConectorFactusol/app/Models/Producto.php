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

    /**
    * Gets all product data from 20Banana's API
    * 
    * @param string    $apikey contains the apikey for authenticating the API
    * @return object   $response product data
    */
    public function get($apikey)
    {
        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'apikey' => $apikey
        ])->get('https://api.20bananas.com/v2.3.php/productos');

        return $response;
    }

    public function post() 
    {
        
    }
}
