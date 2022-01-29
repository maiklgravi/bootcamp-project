<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddGenreInGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('genre')->insertOrIgnore([
            ['name' => 'Comedy'],
            ['name' => 'Dramma'],
            ['name' => 'Adventure'],
            ['name' => 'Detective'],
            ['name' => 'Horror'],
            ['name' => 'Romance'],
            ['name' => 'Western'],
            ['name' => 'Historical'],
            ['name' => 'Fantasy'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
