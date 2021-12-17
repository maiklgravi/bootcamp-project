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
            $table->integer('film_id')->unique();
            $table->string('lang',50);
            $table->string('screenwriter',50);
            $table->string('actors',50);
            $table->string('country',50);
            $table->integer('duration');
            $table->foreign('film_id')->references('id')->on('films')->cascadeOnUpdate()->cascadeOnDelete();
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
