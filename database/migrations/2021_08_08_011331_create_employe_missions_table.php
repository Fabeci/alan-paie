<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_missions', function (Blueprint $table) {
            $table->id();
            $table->integer('statut')->default(0);
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('mission_id')->constrained('missions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employe_missions');
    }
}
