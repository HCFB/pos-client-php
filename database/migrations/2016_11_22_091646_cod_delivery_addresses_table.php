<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CodDeliveryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cod_delivery_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country', 255);
            $table->string('region', 255);
            $table->string('city', 255);
            $table->string('postcode', 20);
            $table->string('address1');
            $table->string('address2');

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
       Schema::drop('cod_delivery_addresses');
    }
}
