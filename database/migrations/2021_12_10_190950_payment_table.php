<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE TABLE `payment` (
            `id` bigint(20) AUTO_INCREMENT,
            `id_user` bigint(20) UNSIGNED,
            `month` int NOT NULL ,
            `date_payment`  DATE  NOT NULL ,
             PRIMARY KEY (`id`),
             FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) 
             ON UPDATE CASCADE  ON DELETE CASCADE
              ) ENGINE=InnoDB
            ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TABLE `payment`");
    }
}
