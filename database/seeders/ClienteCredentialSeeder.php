<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ClienteCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cliente_credentials')->insert([
            'name' => 'danny',
            'apikey' => '3741b78df9262be12be380987d275c6f',
            'codigoFabricante' => '305',
            'codigoCliente' => '99973',
            'baseDatosCliente' => 'FS305',
            'password' => 'RExVUDczN2NkanZP'
        ]);

        DB::table('cliente_credentials')->insert([
            'name' => 'castellocomercial',
            'apikey' => '2049ff495e5043023aaaa4d5f3f9d035',
            'codigoFabricante' => '305',
            'codigoCliente' => '99973',
            'baseDatosCliente' => 'FS305',
            'password' => 'RExVUDczN2NkanZP'
        ]);



    }
}
