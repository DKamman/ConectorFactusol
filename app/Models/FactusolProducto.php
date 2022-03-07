<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;


class FactusolProducto extends Model
{
    use HasFactory;

    /**
     * Gets all products from the Factusol API
     * 
     * @param string $token contains the bearer token for the API call
     * @return array $response['resultado'] contains all product data 
     */
    public function get($token) 
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->withToken($token)
        ->withBody(
            '{
                "ejercicio":"2022",
                "tabla":"F_ART",
                "filtro":"CODART != \'\'"
            }', 'application/json'
        )->post('https://api.sdelsol.com/admin/CargaTabla')['resultado'];

        return $response;
    }

    public function filter($response) {
        $array = array();

        foreach ($response as $records) {
            $product = new Producto;
            foreach ($records as $record) {
                if ($record['columna'] == 'CCOART')  {
                    $product->referencia = $record['dato'];
                };
                if ($record['columna'] == 'DESART')  {
                    $product->nombre = $record['dato'];
                };
                // if ($record['columna'] == 'DESART')  {
                //     $product->activo = $record['dato'];
                // };
                if ($record['columna'] == 'DETART')  {
                    $product->subfamilia = $record['dato'];
                };
                if ($record['columna'] == 'FAMART')  {
                    $product->familia = $record['dato'];
                };
                if ($record['columna'] == 'PCOART')  {
                    $product->precio = $record['dato'];
                };
                // if ($record['columna'] == 'DESART')  {
                //     $product->nombre = $record['dato'];
                // };
                // if ($record['columna'] == 'DESART')  {
                //     $product->nombre = $record['dato'];
                // };
                // if ($record['columna'] == 'DESART')  {
                //     $product->nombre = $record['dato'];
                // };
                // if ($record['columna'] == 'DESART')  {
                //     $product->nombre = $record['dato'];
                // };
                // if ($record['columna'] == 'DESART')  {
                //     $product->nombre = $record['dato'];
                // };
                // if ($record['columna'] == 'DESART')  {
                //     $product->nombre = $record['dato'];
                // };
                // if ($record['columna'] == 'DESART')  {
                //     $product->nombre = $record['dato'];
                // };
                // if ($record['columna'] == 'DESART')  {
                //     $product->nombre = $record['dato'];
                // };
                // if ($record['columna'] == 'DESART')  {
                //     $product->nombre = $record['dato'];
                // };
                if ($record['columna'] == 'IMGART')  {
                    $product->foto = $record['dato'];
                };

                //  $referencia;
                //  $nombre;
                //  $activo;
                //  $subfamilia;
                //  $familia;
                //  $precio;
                //  $unidad;
                //  $unidadesxbulto;
                //  $unidadbulto;
                //  $unidadesxbulto2;
                //  $unidadbulto2;
                //  $vendounidad;
                //  $vendobulto;
                //  $vendobulto2;
                //  $descripcion;
                //  $tags;
                //  $foto;
            }
            array_push($array, $product);
        }
        return $array;
    }
}
