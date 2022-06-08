<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteCredentials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_credentials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apikey');
            $table->string('codigoFabricante');
            $table->string('codigoCliente');
            $table->string('baseDatosCliente');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_credentials');
    }
}
