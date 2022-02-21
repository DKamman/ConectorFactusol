<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Cliente extends Model
{
    use HasFactory;
    protected $url = 'https://api.20bananas.com/v2.3.php/clientes';

    protected $codcliente;
    protected $codcomercial;
    protected $nombrecliente;
    protected $diasreparto;
    
    /**
     * Gets all client data from 20Banana's API
     * 
     * @param string    $apikey contains the apikey for authenticating the API
     * @return object   $response client data
     */
    public function get($apikey)
    {
        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'apikey' => $apikey
        ])->get('https://api.20bananas.com/v2.3.php/clientes');

        return $response;
    }

    public function post()
    {
        //
    }

}
