<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('reunion_id');
            $table->foreign('reunion_id')->references('id')->on('reunions');
            
            $table->string('type_du_element', 50);
            $table->text('commentaire')->nullable();
            $table->tinyInteger('finalise')->default(0);
            $table->tinyInteger('a_publie_dans_pv')->default(1);
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
        Schema::dropIfExists('elements');
    }
}
