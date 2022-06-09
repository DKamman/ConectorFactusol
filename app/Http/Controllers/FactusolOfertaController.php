<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FactusolApi;
use App\Models\FactusolOferta;
use App\Models\FactusolOfertaHeader;
use App\Models\ClienteCredential;

class FactusolOfertaController extends Controller
{
    public static function index() {
        $ofertas = FactusolOferta::all();
        $header = FactusolOfertaHeader::first();
        if ($header != null) {
            $statusCode = intval($header->statusCode);
        } else {
            $statusCode = null;
        }

        $credentials = ClienteCredential::all();

        return view('factusol.ofertas', [
            'response' => $ofertas,
            'header' => $header,
            'statusCode' => $statusCode,
            'credentials' => $credentials
        ]);
    }

    public static function get(Request $request) {
        $name = $request->credential;
        $credential = ClienteCredential::where('name', $name)->first();

        $token = FactusolApi::getBearerToken($credential);
        $response = FactusolOferta::get($token);

        if (FactusolOfertaHeader::exists()) {
            FactusolOfertaHeader::truncate();
        }

        $ofertaHeader = new FactusolOfertaHeader;
        $ofertaHeader->status = $response['respuesta'];
        $ofertaHeader->statusCode = $response->getStatusCode();
        $ofertaHeader->save();

        if (FactusolOferta::exists()) {
            FactusolOferta::truncate();
        }

        foreach ($response['resultado'] as $values) {
            $oferta = new FactusolOferta;
            foreach ($values as $value) {
                if ($value['columna'] == "TIPDES") {
                    $oferta->TIPDES = $value['dato'];
                }
                if ($value['columna'] == "ARFDES") {
                    $oferta->ARFDES = $value['dato'];
                }
                if ($value['columna'] == "DESDES") {
                    $oferta->DESDES = $value['dato'];
                }
                if ($value['columna'] == "FIJDES") {
                    $oferta->FIJDES = $value['dato'];
                }
                if ($value['columna'] == "PORDES") {
                    $oferta->PORDES = $value['dato'];
                }
                if ($value['columna'] == "TDEDES") {
                    $oferta->TDEDES = $value['dato'];
                }
                if ($value['columna'] == "IMPDES") {
                    $oferta->IMPDES = $value['dato'];
                }
                if ($value['columna'] == "TFIDES") {
                    $oferta->TFIDES = $value['dato'];
                }
            }
            $oferta->save();
        }
        return redirect()->route('factusol.ofertas.index');
    }
}
