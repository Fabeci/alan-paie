<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreavisRetraitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preavis_retraites', function (Blueprint $table) {
            $table->id();
            $table->integer('age_limite');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamps();

            $table->foreignId('employe_id')->constrained('employes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preavis_retraites');
    }
}
