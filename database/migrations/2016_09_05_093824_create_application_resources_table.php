<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idApplication');
            $table->integer('client_info_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->string('status')->nullable();
            $table->string('cancelReason')->nullable();
            $table->string('maxLimit')->nullable();
            //$table->integer('application_id');
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
        Schema::drop('application_resources');
    }
}
