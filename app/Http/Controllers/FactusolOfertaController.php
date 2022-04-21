<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FactusolApi;
use App\Models\FactusolOferta;
use App\Models\FactusolOfertaHeader;

class FactusolOfertaController extends Controller
{
    public function index() {
        $ofertas = FactusolOferta::all();
        $header = FactusolOfertaHeader::first();
        if ($header != null) {
            $statusCode = intval($header->statusCode);
        } else {
            $statusCode = null;
        }

        return view('factusol.ofertas', [
            'response' => $ofertas,
            'header' => $header,
            'statusCode' => $statusCode
        ]);
    }

    public function get() {
        $token = FactusolApi::getBearerToken();
        $response = FactusolOferta::get($token);
        // dd($response['resultado']);

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
