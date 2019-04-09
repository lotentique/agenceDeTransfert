<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarif_intervals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('min', 8, 2);
            $table->decimal('max', 8, 2);
            $table->decimal('tarif', 8, 2);
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
        Schema::dropIfExists('tarif_intervals');
    }
}
