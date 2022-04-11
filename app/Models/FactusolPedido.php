<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class FactusolPedido extends Model
{
    use HasFactory;
    protected static $url = "https://api.sdelsol.com/admin/EscribirRegistro";

    public static function post($token, $body) {
        {
            $response = Http::withOptions([
                'verify' => false,
            ])->withToken($token)->
            withBody(
                `
                    "ejercicio":"2022",
                    "tabla":"F_PCL",
                `, 'application/json'
            )->post(FactusolPedido::$url, $body);
    
            dd($response['respuesta']);
        }
    }
}
