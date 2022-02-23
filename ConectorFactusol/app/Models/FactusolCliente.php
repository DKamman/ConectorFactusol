<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class FactusolCliente extends Model
{
    use HasFactory;

    public function get($token) 
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->withToken($token)
        ->withBody(
            "{
                'ejercicio':'2022',
                'tabla':'F_CLI',
                'filtro':'CODCLI > 0'
            }", 'application/json'
        )->post('https://api.sdelsol.com/admin/CargaTabla')['resultado'];

        $array = array();

        foreach ($response as $records) {
            $client = [];
            foreach ($records as $record) {                
                if ($record['columna'] == 'CODCLI')  {
                    array_push($client, $record);
                };
                if ($record['columna'] == 'NOCCLI')  {
                    array_push($client, $record);
                };
            }
            array_push($array, $client);
        }

        return $array;
    }
}
