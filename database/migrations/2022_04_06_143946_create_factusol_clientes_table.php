<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactusolClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factusol_clientes', function (Blueprint $table) {
            $table->id();
            $table->string('CODCLI');
            $table->string('CCOCLI');
            $table->string('NIFCLI');
            $table->string('NOFCLI');
            $table->string('NOCCLI');
            $table->string('DOMCLI');
            $table->string('POBCLI');
            $table->string('CPOCLI');
            $table->string('PROCLI');
            $table->string('TELCLI');
            $table->string('FAXCLI');
            $table->string('PCOCLI');
            $table->string('AEGCLI')->nullable();
            $table->string('BANCLI');
            $table->string('ENTCLI');
            $table->string('OFICLI');
            $table->string('DCOCLI');
            $table->string('CUECLI');
            $table->string('FPACLI');
            $table->string('FINCLI');
            $table->string('PPACLI');
            $table->string('TARCLI');
            $table->string('DP1CLI');
            $table->string('DP2CLI');
            $table->string('DP3CLI');
            $table->string('TCLCLI');
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
        Schema::dropIfExists('factusol_clientes');
    }
}
