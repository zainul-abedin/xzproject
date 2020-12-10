<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChantierContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chantier_contact', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('chantier_id');
            $table->foreign('chantier_id')->references('id')->on('contacts');
            
            $table->unsignedBigInteger('contact_id');
            $table->foreign('contact_id')->references('id')->on('chantiers');
            
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
        Schema::dropIfExists('chantier_contact');
    }
}
