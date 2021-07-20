<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->date('cessation')->nullable();
            $table->double('salaire_base', 8, 2)->nullable();
            $table->text('fichier')->nullable();
            $table->timestamps();

            $table->foreignId('type_contrat_id')->constrained('type_contrats');
            $table->foreignId('classification_id')->constrained('classifications');
            $table->foreignId('poste_id')->constrained('postes');
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
        Schema::dropIfExists('contrats');
    }
}
