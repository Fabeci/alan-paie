<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom_commercial');
            $table->string('activite')->nullable();
            $table->string('numero_identification');
            $table->date('date_creation')->useCurrent();
            $table->string('effectif')->default('1-5');
            $table->string('ville');
            $table->string('complement')->nullable();
            $table->string('bp');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();;
            $table->string('telegram')->nullable();;
            $table->text('description')->nullable();
            $table->text('logo')->nullable();
            $table->boolean('statut')->default(0);
            $table->timestamps();

            $table->foreignId('secteur_activite_id')->constrained('secteur_activites');
            $table->foreignId('forme_juridique_id')->constrained('forme_juridiques');
            $table->foreignId('country_id')->constrained('countries');
            $table->foreignId('dirigeant_id')->constrained('dirigeants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}
