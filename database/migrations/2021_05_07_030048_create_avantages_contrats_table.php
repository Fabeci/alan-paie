<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvantagesContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avantage_contrat', function (Blueprint $table) {
            $table->id();
            $table->integer('taux')->nullable();
            $table->integer('valeur')->nullable();
            $table->timestamps();

            $table->foreignId('contrat_id')->constrained('contrats');
            $table->foreignId('avantage_id')->constrained('avantages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avantage_contrat');
    }
}
