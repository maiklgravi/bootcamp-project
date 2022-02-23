<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumStatusInFilms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('films', function (Blueprint $table) {
            $table->renameColumn('status', 'public_availability');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('films', function (Blueprint $table) {
            $table->renameColumn('public_availability', 'status');
        });
    }
}
