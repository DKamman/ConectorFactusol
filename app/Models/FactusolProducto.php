<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;


class FactusolProducto extends Model
{
    use HasFactory;

    protected static $url = 'https://api.sdelsol.com/admin/CargaTabla/';

    /**
     * Gets all products from the Factusol API
     * 
     * @param string $token contains the bearer token for the API call
     * @return array $response['resultado'] contains all product data 
     */
    public static function get($token) 
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->withToken($token)
        ->withBody(
            '{
                "ejercicio":"2022",
                "tabla":"F_ART",
                "filtro":"CODART != \'\'"
            }', 'application/json'
        )->post(FactusolProducto::$url)['resultado'];

        return $response;
    }

    public static function filter($response, $token) {

        $array = array();

        foreach ($response as $records) {
            $product = new Producto;
            foreach ($records as $record) {
                $familiaCodigo; 
                $subfamiliaCodigo;
                if ($record['columna'] == 'CODART')  {
                };
                if ($record['columna'] == 'CCOART')  {
                    $product->referencia = $record['dato'];
                };
                if ($record['columna'] == 'DESART')  {
                    $product->nombre = $record['dato'];
                };
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
                                $product->subfamilia = $record['dato'];
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
                                            $product->familia = $record['dato'];
                                        }
                                    }
                                }
                            }
                        }
                    }
                };
                if ($record['columna'] == 'PCOART')  {
                    $product->precio = $record['dato'];
                };
                if ($record['columna'] == 'UPPART')  {
                    $product->unidad = $record['dato'];
                };

                if ($record['columna'] == 'IMGART')  {
                    // dd($record['dato']);
                    $product->foto = $record['dato'];
                };
                $product->unidadbulto = '';
                $product->unidadbulto2 = '';
                $product->unidadesxbulto = '';
                $product->unidadesxbulto2 = '';

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
