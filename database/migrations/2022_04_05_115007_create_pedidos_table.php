<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('idpedido');
            $table->string('desdedispositivo');
            $table->string('codcliente');
            $table->string('nombrecliente');
            $table->string('fecha');
            $table->string('hora');
            $table->string('envioemail');
            $table->string('totalimporte');
            $table->string('enviado10');
            $table->string('servido10');
            $table->string('integradoERP10');
            $table->string('codcomercial');
            $table->string('clienteParticular');
            $table->string('comentarios')->nullable();
            $table->string('fechaEntrega');
            $table->string('numpedidoCliente');
            $table->string('rutaReparto');
            $table->string('enviadoPorComercial');
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
        Schema::dropIfExists('pedidos');
    }
}
