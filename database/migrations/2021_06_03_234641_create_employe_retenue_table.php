<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeRetenueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_retenue', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('taux_salarial')->default(0);
            $table->float('valeur_salariale', 10, 2)->default(0);
            $table->timestamps();

            $table->foreignId('employe_id')->constrained('employes');
            $table->foreignId('retenue_id')->constrained('retenues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employe_retenue');
    }
}
