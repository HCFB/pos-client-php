<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CodOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cod_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('remoteId', 255)->nullable();
            $table->dateTime('validTo')->nullable();
            $table->string('status', 20)->nullable();
            $table->decimal('servicePrice')->nullable();
            $table->decimal('goodsPrice')->nullable();
            $table->decimal('totalPrice')->nullable();
            $table->string('currency', 10)->nullable();

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
        Schema::drop('cod_offers');
    }
}
