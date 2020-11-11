<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id');
            $table->string('image');
            $table->timestamps();

            $table->foreign('note_id')->references('id')
                ->on('notes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_images');
    }
}
