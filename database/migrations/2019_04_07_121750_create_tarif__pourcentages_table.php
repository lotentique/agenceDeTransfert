<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifPourcentagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarif_Pourcentages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('pourcentage', 3, 2);
            $table->dateTime('date_debut');
            $table->dateTime('date_fin')->nullable();
            $table->bigInteger('cree_par');
            $table->bigInteger('modifier_par')->nullable();
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
        Schema::dropIfExists('tarifPourcentages');
    }
}