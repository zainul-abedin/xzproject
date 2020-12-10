<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('prenom', 50)->nullable();
            $table->string('nom', 50)->nullable();
            $table->string('nom_de_societe', 50)->nullable();
            $table->string('telephone_portable', 20)->nullable();
            $table->string('telephone_domicile', 20)->nullable();
            $table->string('telephone_bureau', 20)->nullable();
            $table->string('autre_telephone', 20)->nullable();
            $table->string('mail_professionnel', 50)->nullable();
            $table->string('mail_personnel', 50)->nullable();
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
