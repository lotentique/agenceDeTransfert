<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('montant', 9, 2);
            $table->decimal('tarif',8, 2);
            $table->string('code_transfer');
            $table->boolean('status')->default(false);
            $table->datetime('date_recuperation')->nullable();
            $table->bigInteger('effectue_par');
            $table->bigInteger('modifier_par')->nullable();
            $table->bigInteger('nni_beneficiaire')->nullable();

            $table->bigInteger('id_expediteur');
            $table->bigInteger('id_beneficiaire');
            $table->bigInteger('id_ville');
            $table->bigInteger('id_pnt');

            $table->foreign('id_expediteur')->references('id')->on('expediteurs');
            $table->foreign('id_beneficiaire')->references('id')->on('beneficiaires');
            $table->foreign('id_ville')->references('id')->on('villes');
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
        Schema::dropIfExists('transfert');
    }
}