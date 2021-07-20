<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTypeContratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_type_contrat', function (Blueprint $table) {
            $table->id();
            $table->integer("position");
            $table->text('contenu')->nullable();
            $table->timestamps();

            $table->foreignId('article_id')->constrained('articles');
            $table->foreignId('type_contrat_id')->constrained('type_contrats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_type_contrat');
    }
}
