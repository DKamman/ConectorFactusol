<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class FactusolApi extends Model
{
    use HasFactory;

    /**
     * Generates a bearer token from the Factusol API
     * 
     * @return string $response['resultado'] returns the bearer token
     */
    public static function getBearerToken() 
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->withBody(
            "{
                'codigoFabricante':'305',
                'codigoCliente':'99973',
                'baseDatosCliente':'FS305',
                'password':'RExVUDczN2NkanZP'
                
            }", 'application/json')->post('https://api.sdelsol.com/login/Autenticar');

        return $response['resultado'];
    }
}
