<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CodUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cod_user_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName', 255);
            $table->string('lastName', 255);
            $table->string('middleMame', 255);
            $table->string('email', 255);
            $table->string('phone', 20);

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
        Schema::drop("cod_user_info");
    }
}
