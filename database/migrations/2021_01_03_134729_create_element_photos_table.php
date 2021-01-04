<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element_photos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('element_id');
            $table->foreign('element_id')->references('id')->on('elements');
            
            $table->string('photo_type', 50)->nullable();
            $table->text('description')->nullable();
            $table->string('file_path',150);
            $table->string('file_name',150);
            $table->string('file_mime',50);
            
            $table->string('createur',50);
            
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
        Schema::dropIfExists('element_photos');
    }
}
