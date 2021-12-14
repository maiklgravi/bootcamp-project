<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FilmAlternativeNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_alternative_name', function (Blueprint $table) {
            $table->id();
            $table->integer('id_films');
            $table->string('name', 30);
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
        Schema::dropIfExists('film_alternative_name');
    }
}
