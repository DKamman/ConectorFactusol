<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactusolPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factusol_pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('TIPPCL');
            $table->string('CODPCL');
            $table->string('CNOPCL');
            $table->string('TOTPCL');
            $table->string('CLIPCL');
            $table->string('FECPCL');
            $table->string('AGEPCL');
            $table->string('CEMPCL');
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
        Schema::dropIfExists('factusol_pedidos');
    }
}
