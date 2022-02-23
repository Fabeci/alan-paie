<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conge_user', function (Blueprint $table) {
            $table->id();
            $table->string('statut')->default('En attente');
            $table->time('heure')->nullable();
            $table->string('fichier')->nullable();
            $table->timestamps();

            $table->foreignId('conge_id')->constrained('conges');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conge_user');
    }
}
