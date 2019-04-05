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
            $table->integer('id_ville');
            $table->foreign('id_ville')->references('id')->on('villes');
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
