<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

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
    public static function get($apikey)
    {
        $response = Http::withOptions([
            'verify' => false,
            // 'proxy' => 'http://izdqtgr5xgbe5z:2h4gpv9haieb5u881mjjf1bio9@eu-west-static-05.quotaguard.com:9293'
        ])->withHeaders([
            'apikey' => $apikey
        ])->get(Producto::$url);

        if ($response['response'] == 'ERROR') {
            return 'Unauthorized';
        }

        return $response;
    }

    public static function getTimestamp() {
        return Carbon::now();
    }

    /**
     * POSTS all Product data to 20 Banana's API
     * 
     * @param string $apikey contains the apikey for authenticating the API
     * @return array $response contains product data
     */
    public static function post($apikey, $body) 
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
            'verify' => false,
            // 'proxy' => 'http://izdqtgr5xgbe5z:2h4gpv9haieb5u881mjjf1bio9@eu-west-static-05.quotaguard.com:9293'
        ])->withHeaders([
            'apikey' => $apikey,
            'IMSURE' => 'true'
        ])->delete(Producto::$url . '*');

        $response = Http::withOptions([
            'verify' => false,
            // 'proxy' => 'http://izdqtgr5xgbe5z:2h4gpv9haieb5u881mjjf1bio9@eu-west-static-05.quotaguard.com:9293'
        ])->withHeaders([
            'apikey' => $apikey
        ])->post(Producto::$url, $body);

        return $response;
    }

    public static function filter($response, $token) {

        $array = array();

        foreach ($response['resultado'] as $records) {
            $product = array();
            foreach ($records as $record) {
                $familiaCodigo; 
                $subfamiliaCodigo;
                // if ($record['columna'] == 'CODART')  {
                //     $product['referencia'] = $record['dato'];
                // };
                if ($record['columna'] == 'CCOART')  {
                    $product['referencia'] = $record['dato'];
                }
                if ($record['columna'] == 'DESART')  {
                    $product['nombre'] = $record['dato'];
                }
                if ($record['columna'] == 'FAMART')  {       
                    $response = Http::withOptions([
                        'verify' => false,
                    ])->withToken($token)
                    ->withBody(
                        '{
                            "ejercicio":"2022",
                            "tabla":"F_FAM",
                            "filtro":"CODFAM = \''.$record["dato"].'\'"
                        }', 'application/json'
                    )->post(FactusolProducto::$url)['resultado'];

                    foreach ($response as $records) {
                        foreach ($records as $record) {
                            if ($record['columna'] == 'DESFAM') {
                                $product['subfamilia'] = $record['dato'];
                            }
                            if ($record['columna'] == 'SECFAM') {                               
                                $response = Http::withOptions([
                                    'verify' => false,
                                ])->withToken($token)
                                ->withBody(
                                    '{
                                        "ejercicio":"2022",
                                        "tabla":"F_SEC",
                                        "filtro":"CODSEC = \''.$record["dato"].'\'"
                                    }', 'application/json'
                                )->post(FactusolProducto::$url)['resultado'];

                                foreach ($response as $records) {
                                    foreach ($records as $record) {
                                        if ($record['columna'] == 'DESSEC') {
                                            $product['familia'] = $record['dato'];
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                if ($record['columna'] == 'PCOART')  {
                    $product['precio'] = $record['dato'];
                }

                if ($record['columna'] == 'UPPART')  {
                    $product['unidad'] = $record['dato'];
                }

                if ($record['columna'] == 'IMGART')  {
                    $product['foto'] = $record['dato'];
                }
                // $product->unidadbulto = '';
                // $product->unidadbulto2 = '';
                // $product->unidadesxbulto = '';
                // $product->unidadesxbulto2 = '';

                //  $referencia;
                //  $nombre;
                //  $activo;
                //  $subfamilia;
                //  $familia;
                //  $precio;
                //  $unidad;
                //  $unidadesxbulto;
                //  $unidadbulto;
                //  $unidadesxbulto2;
                //  $unidadbulto2;
                //  $vendounidad;
                //  $vendobulto;
                //  $vendobulto2;
                //  $descripcion;
                //  $tags;
                //  $foto;
                
            }
            // dd($product);
            array_push($array, $product);
        }
        return $array;
    }
}
