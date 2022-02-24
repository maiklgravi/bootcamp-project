<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrewiewFilmsBaner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prewiews_films_baners', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->integer('film_id')->unique();
            $table->foreign('film_id')->references('id')->on('films')->cascadeOnUpdate()->cascadeOnDelete();

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
        Schema::dropIfExists('prewiews_films_baners');
    }
}
