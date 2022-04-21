<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactusolProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factusol_productos', function (Blueprint $table) {
            $table->id();
            $table->string('CODART');
            $table->string('EANART');
            $table->string('EQUART');
            $table->string('FAMART');
            $table->string('DESART');
            $table->string('PHAART');
            $table->string('PCOART');
            $table->string('FALART');
            $table->string('IMGART');
            $table->string('FUMART');
            $table->string('CONART');
            $table->string('ORDART');
            $table->string('FAVART');
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
        Schema::dropIfExists('factusol_productos');
    }
}
