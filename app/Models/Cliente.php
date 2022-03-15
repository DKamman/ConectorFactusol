<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Cliente extends Model
{
    use HasFactory;

    protected $codcliente;
    protected $codcomercial;
    protected $nombrecliente;
    protected $diasreparto;

    public static $url = 'https://api.20bananas.com/v2.3.php/clientes/';
    
    /**
     * Gets all client data from 20Banana's API
     * 
     * @param string    $apikey contains the apikey for authentication of the user on the 20Bananas API
     * @return object   $response client data
     */
    public static function get($apikey)
    {
        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'apikey' => $apikey
        ])->get(Cliente::$url);

        if ($response['response'] == 'ERROR') {
            dd($response['response']);
            return 'Unauthorized';
        }

        return $response['records'];
    }

    /**
     * Takes the refined client data from Factusol and posts it to the 20Bananas database
     * 
     * @param string $apikey contains the apikey for authentication of the user on the 20Bananas API
     * @param array $body contains all objects of clients
     */
    public function post($apikey, $body)
    {

        if (!$apikey) {
            return false;
            exit;
        }

        if (!$body) {
            return false;
            exit;
        }

        Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'apikey' => $apikey,
            'IMSURE' => 'true'
        ])->delete(Cliente::$url . '/*');

        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'apikey' => $apikey
        ])->post(Cliente::$url, $body);

        return $response;
    }
}
