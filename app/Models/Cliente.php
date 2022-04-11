<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class Cliente extends Model
{
    use HasFactory;

    protected $activo;
    protected $codcliente;
    protected $codcomercial;
    protected $nombrecliente;
    protected $diasreparto;

    protected $attributes = [
        'activo' => "s",
        'codcomercial' => '0',
    ];

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
            'verify' => false,
            // 'proxy' => 'http://izdqtgr5xgbe5z:2h4gpv9haieb5u881mjjf1bio9@eu-west-static-05.quotaguard.com:9293'
        ])->withHeaders([
            'apikey' => $apikey
        ])->get(Cliente::$url);

        if ($response['response'] == 'ERROR') {
            return 'Unauthorized';
        }

        return $response;
    }

    public static function getTimestamp() {
        return Carbon::now();
    }

    /**
     * Takes the refined client data from Factusol and posts it to the 20Bananas database
     * 
     * @param string $apikey contains the apikey for authentication of the user on the 20Bananas API
     * @param array $body contains all objects of clients
     */
    public static function post($apikey, $body)
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
            'verify' => false,
            // 'proxy' => 'http://izdqtgr5xgbe5z:2h4gpv9haieb5u881mjjf1bio9@eu-west-static-05.quotaguard.com:9293'
        ])->withHeaders([
            'apikey' => $apikey,
            'IMSURE' => 'true'
        ])->delete(Cliente::$url . '/*');

        $response = Http::withOptions([
            'verify' => false,
            // 'proxy' => 'http://izdqtgr5xgbe5z:2h4gpv9haieb5u881mjjf1bio9@eu-west-static-05.quotaguard.com:9293',
        ])->withHeaders([
            'apikey' => $apikey
        ])->post(Cliente::$url, $body);

        return $response;
    }

    public function filter($response) {
        $array = array();
        foreach ($response['resultado'] as $records) {
            $client = array();
            foreach ($records as $record) {
                if ($record['columna'] == 'CODCLI')  {
                    $client['codcliente'] = $record['dato'];
                };
                if ($record['columna'] == 'NOFCLI')  {
                    $client['nombrecliente'] = $record['dato'];
                };
                if ($record['columna'] == 'AGECLI')  {
                    $client['codcomercial'] = $record['dato'];
                };
            }
            array_push($array, $client);
        }
        return $array;
    }
}
