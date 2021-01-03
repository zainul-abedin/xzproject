<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element_documents', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('element_id');
            $table->foreign('element_id')->references('id')->on('elements');
            
            $table->string('document_type', 50)->nullable();
            $table->text('description')->nullable();
            $table->string('document', 150);
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
        Schema::dropIfExists('element_documents');
    }
}
