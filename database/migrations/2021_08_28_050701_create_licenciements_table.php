<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenciements', function (Blueprint $table) {
            $table->id();
            $table->date('date_courrier');
            $table->integer('licenciable_id');
            $table->string('licenciable_type');
            $table->text('description')->nullable();
            $table->timestamps();
            
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
        Schema::dropIfExists('licenciements');
    }
}
