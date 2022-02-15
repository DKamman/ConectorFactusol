<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function vbClientes() {
        $response = Http::withHeaders([
            'apikey' => '3741b78df9262be12be380987d275c6f'
        ])->get('https://api.20bananas.com/v2.3.php/clientes');

        dd($response);
        return view('20bananas.clientes');
    }
}
