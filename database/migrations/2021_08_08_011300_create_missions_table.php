<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->string('motif');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->integer('duree')->nullable();
            $table->double('montant_total', 8, 2)->nullable();
            $table->double('montant_avance', 8, 2)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('createur_id')->constrained('users');
            $table->foreignId('country_id')->constrained('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missions');
    }
}
