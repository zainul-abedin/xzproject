<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chantier_id');
            $table->foreign('chantier_id')->references('id')->on('chantiers');
            
            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->foreign('responsable_id')->references('id')->on('responsables');
            
            $table->string('title', 100);
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->boolean('allDay')->default(0);
            $table->boolean('statut')->default(0);
            $table->text('description')->nullable();
            $table->string('photo', 50)->nullable();
            $table->string('color', 16)->nullable();
            $table->string('textColor', 16)->nullable();
            $table->string('createur', 50)->nullable();
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
        
        Schema::dropIfExists('reunions');
    }
}
