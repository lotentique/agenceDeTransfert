<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriqueCaissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historique_caisses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('effectue_par');
            $table->enum('operation', ['ajout','retirais']);
            $table->decimal('montant', 15, 2);

            $table->bigInteger('id_pnt');

            $table->foreign('id_pnt')->references('id')->on('point_de_transferts');
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
        Schema::dropIfExists('historique_caisses');
    }
}