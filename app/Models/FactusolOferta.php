<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class FactusolOferta extends Model
{
    use HasFactory;

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
        )->post('https://api.sdelsol.com/admin/CargaTabla')['resultado'];

        return $response;
    }

    public static function filter($response, $token) {
        
        $array = array();

        foreach ($response as $records) {
            $oferta = new Oferta;
            foreach ($records as $record) {
                if ($record['columna'] == 'DESDES');
            }
        }

        return $array;
    }
}
