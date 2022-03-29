<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;


class Oferta extends Model
{
    use HasFactory;

    protected $referencia;
    protected $codcliente;

    public static $url = 'https://api.20bananas.com/v2.3.php/ofertas/';

    public static function get($apikey) {

        $response = Http::withOptions([
            'verify' => false,
            'proxy' => 'http://izdqtgr5xgbe5z:2h4gpv9haieb5u881mjjf1bio9@eu-west-static-05.quotaguard.com:9293'
        ])->withHeaders([
            'apikey' => $apikey
        ])->get(Oferta::$url);

        if ($response['response'] == 'ERROR') {
            return 'Unauthorized';
        }

        return $response;
        
    }

    public static function post($apikey, $body) {

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
            'proxy' => 'http://izdqtgr5xgbe5z:2h4gpv9haieb5u881mjjf1bio9@eu-west-static-05.quotaguard.com:9293'
        ])->withHeaders([
            'apikey' => $apikey,
            'IMSURE' => 'true'
        ])->delete(Oferta::$url . '/*');

        $response = Http::withOptions([
            'verify' => false,
            'proxy' => 'http://izdqtgr5xgbe5z:2h4gpv9haieb5u881mjjf1bio9@eu-west-static-05.quotaguard.com:9293'
        ])->withHeaders([
            'apikey' => $apikey
        ])->post(Oferta::$url, $body);

        return $response;
    }
}
