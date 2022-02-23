<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciementMotifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenciement_motif', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('motif_id')->constrained('motifs');
            $table->foreignId('licenciement_id')->constrained('licenciements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenciement_motif');
    }
}
