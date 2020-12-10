<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chantier_adresse_id');
            $table->foreign('chantier_adresse_id')->references('id')->on('chantier_adresses');
            
            $table->string('batiment', 20)->nullable();
            $table->string('escalier', 20)->nullable();
            $table->string('etage', 20)->nullable();
            $table->string('porte', 20)->nullable();
            $table->string('interphone', 50)->nullable();
            $table->string('digicode', 20)->nullable();
            $table->string('prm',20)->nullable();
            $table->string('superficie',10)->nullable();
            $table->string('appartement_type',50)->nullable();
            $table->text('description');
            $table->string('createur',20);  
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
        Schema::dropIfExists('locations');
    }
}
