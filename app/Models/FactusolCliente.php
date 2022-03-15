<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use App\Models\Cliente;

class FactusolCliente extends Model
{
    use HasFactory;

    /**
     * Gets all clients from the Factusol API and strips all unnecesary columns 
     * and puts all usuable information into an object following the 20Bananas Data Model
     * 
     * @param string $token contains the bearer token for the API call
     * @return array $array 
     */
    public static function get($token) 
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
            $client = new Cliente;
            foreach ($records as $record) {
                if ($record['columna'] == 'CODCLI')  {
                    $client->codcliente = $record['dato'];
                };
                if ($record['columna'] == 'NOCCLI')  {
                    $client->nombrecliente = $record['dato'];
                };
                if ($record['columna'] == 'AGECLI')  {
                    $client->codcomercial = $record['dato'];
                };
            }
            array_push($array, $client);
        }
        return $array;
    }
}
