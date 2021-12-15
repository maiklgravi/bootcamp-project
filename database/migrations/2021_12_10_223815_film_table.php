<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE TABLE `films` (
        `id` int NOT NULL  AUTO_INCREMENT,
        `image` varchar(100) NOT NULL,
        `description` TEXT NOT NULL,
        `date` DATE ,
        `name` varchar(100) NOT NULL,
        `status` INT, 
        PRIMARY KEY(id))ENGINE=InnoDB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TABLE `films`");
    }
}
