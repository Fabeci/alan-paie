<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiseAPiedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mise_a_pieds', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_effet');
            $table->dateTime('date_reprise');
            $table->integer('duree');
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
        Schema::dropIfExists('mise_a_pieds');
    }
}
