<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciementPersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenciement_personnels', function (Blueprint $table) {
            $table->id();
            $table->string('nature');
            $table->date('date_effet');
            $table->string('date_retrait');
            $table->timestamps();
            
            $table->foreignId('service_id')->constrained('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenciement_personnels');
    }
}
