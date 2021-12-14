<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PivotGenreFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE TABLE `genre_films`(
        `id_films` int NOT NULL,
        `id_genre` int NOT NULL,
        FOREIGN KEY (id_films) REFERENCES films(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
        FOREIGN KEY (id_genre) REFERENCES genre(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE)ENGINE=InnoDB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TABLE `genre_films");
    }
}
