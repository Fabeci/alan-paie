<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDroitsProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('droits_profils', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('droit_id')->constrained('droits');
            $table->foreignId('profil_id')->constrained('profils');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('droits_profils');
    }
}
