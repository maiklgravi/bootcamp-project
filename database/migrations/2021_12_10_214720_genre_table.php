<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class GenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE TABLE `genre`(
            `id` int NOT NULL  AUTO_INCREMENT,
            `name` varchar(50) NOT NULL unique,
            PRIMARY KEY(id)
            )ENGINE=InnoDB
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TABLE `genre`");
    }
}
