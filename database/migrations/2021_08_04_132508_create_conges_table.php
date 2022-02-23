<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->string('libelle')->nullable();
            $table->date('date_debut')->useCurrent();
            $table->date('date_fin')->nullable();
            $table->integer('duree')->nullable();
            $table->string('nombre_jour')->default(1);
            $table->string('statut')->default('En attente');
            $table->string('fichier')->nullable();
            $table->text('description')->nullable(); 
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('type_conge_id')->constrained('type_conges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conges');
    }
}
