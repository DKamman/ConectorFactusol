<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\OfertaHeader;


class OfertaController extends Controller
{
    protected $apikey = '3741b78df9262be12be380987d275c6f';

    public static function index() {
        $ofertas = Oferta::all();
        $header = OfertaHeader::first();
        if ($header != null) {
            $statusCode = intval($header->statusCode);
        } else {
            $statusCode = null;
        }

        return view('20bananas.ofertas', [
            'response' => $ofertas,
            'header' => $header,
            'statusCode' => $statusCode
        ]);
    }

    public static function get() {
        $response = Oferta::get($this->apikey);

        if (OfertaHeader::exists()) {
            OfertaHeader::truncate();
        }

        $ofertaHeader = new OfertaHeader;
        $ofertaHeader->status = $response['response'];
        $ofertaHeader->statusCode = $response->getStatusCode();
        $ofertaHeader->save();

        if (Oferta::exists()) {
            Oferta::truncate();
        }

        foreach ($response['records'] as $value) {
            $oferta = new Oferta;
            $oferta->esoferta = $value['esoferta'];
            $oferta->referencia = $value['referencia'];
            $oferta->codcliente = $value['codcliente'];
            $oferta->codtarifa = $value['codtarifa'];
            $oferta->preciofijo = $value['preciofijo'];
            $oferta->porcentajedesc = $value['porcentajedesc'];
            $oferta->fechainicio = $value['fechainicio'];
            $oferta->fechafin = $value['fechafin'];
            $oferta->save();
        }

        return redirect()->route('20bananas.ofertas.index');
    }
}
