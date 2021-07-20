<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('matri_emp')->unique();
            $table->string('nom_emp');
            $table->string('prenom_emp');
            $table->string('sexe_emp');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('password_conf');
            $table->string('datenaiss_emp');
            $table->string('telephone_emp');
            $table->string('nif_emp');
            $table->string('bp_emp');
            $table->string('ville_emp');
            $table->string('quartier_emp')->default();
            $table->enum('situation_emp', ['Celibataire','Marié(e)','Veuf/ve','Divorcé(e)']);
            $table->boolean('has_child')->default(false);
            $table->boolean('is_archived')->default(0);
            $table->string('nb_enfant')->default(0);
            $table->string('photo_emp')->nullable();
            $table->string('initiales_emp')->nullable();
            $table->string('signature_emp')->nullable();
            $table->string('nom_conj')->nullable();
            $table->string('prenom_conj')->nullable();
            $table->string('nif_conj')->nullable();
            $table->date('datenaiss_conj')->nullable();
            $table->string('telephone_conj')->nullable();
            $table->string('profession_conj')->nullable();
            $table->boolean('is_deceased')->default(false)->nullable();
            $table->string('date_deces_conj')->nullable();
            $table->string('bp_conj')->nullable();
            $table->string('ville_conj')->nullable();
            $table->string('employeur_conj')->nullable();
            $table->timestamps();

            $table->foreignId('nationalite_id')->constrained('nationalites');
            $table->foreignId('service_id')->constrained('services');
            $table->foreignId('entreprise_id')->constrained('entreprises');
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
        Schema::dropIfExists('employes');
    }
}
