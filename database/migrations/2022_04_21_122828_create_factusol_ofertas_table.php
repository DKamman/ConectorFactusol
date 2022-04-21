<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactusolOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factusol_ofertas', function (Blueprint $table) {
            $table->id();
            $table->string('TIPDES');
            $table->string('ARFDES');
            $table->string('DESDES');
            $table->string('FIJDES');
            $table->string('PORDES');
            $table->string('TDEDES');
            $table->string('IMPDES');
            $table->string('TFIDES');
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
        Schema::dropIfExists('factusol_ofertas');
    }
}
