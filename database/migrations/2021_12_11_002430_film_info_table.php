<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FilmInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_info', function (Blueprint $table) {
            $table->id();
            $table->integer('id_films',15)->unique();
            $table->string('lang',15);
            $table->string('screenwriter',35);
            $table->string('actors',50);
            $table->string('country',20);
            $table->integer('duration');
            $table->timestamps();
            $table->foreign('id_films')->references('id')->on('films')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_info');
    }
}
