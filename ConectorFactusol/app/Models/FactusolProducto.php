<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;


class FactusolProducto extends Model
{
    use HasFactory;

    public function get($token) 
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
        )->post('https://api.sdelsol.com/admin/CargaTabla');

        return $response;
    }
}
