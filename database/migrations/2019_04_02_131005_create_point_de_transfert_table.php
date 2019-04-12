<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointDeTransfertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_de_transferts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cartier');
            $table->bigInteger('id_ville');
            $table->string('nom');
            $table->foreign('id_ville')->references('id_ville')->on('villes');
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
        Schema::dropIfExists('point_de_transfert');
    }
}
