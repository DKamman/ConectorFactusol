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
            'name' => 'holandalucia',
            'apikey' => '3741b78df9262be12be380987d275c6f'
        ]);
    }
}
