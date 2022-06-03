<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;


class FactusolProducto extends Model
{
    use HasFactory;

    public static $url = 'https://api.sdelsol.com/admin/CargaTabla/';

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
        )->post(FactusolProducto::$url);

        return $response;
    }

    public static function filter($response) {
        
        foreach ($response as $value) {
            echo $value;
        }
    }
}
