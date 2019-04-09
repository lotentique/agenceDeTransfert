<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametreAppliqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Parametre_Appliques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('regle');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin')->nullable();
            $table->bigInteger('cree_par');
            $table->bigInteger('modifier_par')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('ParametreAppliques');
    }
}
