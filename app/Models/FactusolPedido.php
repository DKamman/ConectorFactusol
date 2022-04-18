<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class FactusolPedido extends Model
{
    use HasFactory;

    public static $url = "https://api.sdelsol.com/admin/EscribirRegistro";

    public function get($token) {
        $response = Http::withOptions([
            'verify' => false,
        ])->withToken($token)
        ->withBody(
            "{
                'ejercicio':'2022',
                'tabla':'F_PCL',
                'filtro':'CODPCL > 0'
            }", 'application/json'
        )->post('https://api.sdelsol.com/admin/CargaTabla');

        return $response;
    }

    public function post($token, $body) {
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
