<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class FactusolOferta extends Model
{
    use HasFactory;

    protected static $url = 'https://api.sdelsol.com/admin/CargaTabla/';

    public static function get($token) {
        
        $response = Http::withOptions([
            'verify' => false,
        ])->withToken($token)
        ->withBody(
            '{
                "ejercicio":"2022",
                "tabla":"F_DES",
                "filtro":"ARFDES != \'\'"
            }', 'application/json'
        )->post(FactusolOferta::$url)['resultado'];

        return $response;
    }

    public static function filter($response, $token) {
        
        $array = array();

        foreach ($response as $records) {
            foreach ($records as $record) {
                if ($record['columna'] == 'ARFDES') {
                    $subResponse = Http::withOptions([
                        'verify' => false,
                    ])->withToken($token)
                    ->withBody(
                        '{
                            "ejercicio":"2022",
                            "tabla":"F_ART",
                            "filtro":"FAMART = \''.$record['dato'].'\'"
                        }', 'application/json'
                    )->post(FactusolOferta::$url)['resultado'];
                    
                    foreach ($subResponse as $records) {
                        $oferta = new Oferta;
                        foreach ($records as $record) {
                            if ($record['columna'] == 'CCOART') {
                                $oferta->referencia = $record['dato'];
                            }
                            $oferta->codcliente = "";
                            $oferta->codtarifa = "";                            
                        }
                        array_push($array, $oferta);
                    }
                }
            }
        }
        return $array;
    }
}
