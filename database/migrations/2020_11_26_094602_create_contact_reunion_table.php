<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactReunionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_reunion', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('contact_id');
            $table->foreign('contact_id')->references('id')->on('reunions');
            
            $table->unsignedBigInteger('reunion_id');
            $table->foreign('reunion_id')->references('id')->on('contacts');
            
            $table->string('activite_de_contact', 100)->nullable();
            $table->string('statut', 50);
            
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
        Schema::dropIfExists('contact_reunion');
    }
}
