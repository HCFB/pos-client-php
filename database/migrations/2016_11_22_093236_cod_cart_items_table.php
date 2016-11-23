<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CodCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cod_cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("offer_id");
            $table->string('name', 255);
            $table->string('quantity', 255);
            $table->string('seller', 255);
            $table->decimal('amount');
            $table->string('currency', 10);
            $table->string('category', 255);
            $table->string('weight', 20);
            $table->timestamps();
            $table->foreign('offer_id')->references('id')->on('cod_offers');
        });

        /*
         * <createTable tableName="cod_cart_items">
            <column name="id" type="BIGINT" remarks="Новое значение счетчика">
                <constraints primaryKey="true" primaryKeyName="PK_COD_CART_ITEM"/>
            </column>
            <column name="offer_id"  type="BIGINT">
                <constraints
                        nullable="true"
                        foreignKeyName="FK_COD_CART_ITEM"
                        referencedTableName="cod_offers"
                        referencedColumnNames="id"
                />
            </column>
            <column name="name" type="VARCHAR(255)">
                <constraints nullable="false"/>
            </column>
            <column name="quantity" type="VARCHAR(255)">
                <constraints nullable="false"/>
            </column>
            <column name="seller" type="VARCHAR(255)">
                <constraints nullable="false"/>
            </column>
            <column name="amount" type="NUMERIC">
                <constraints nullable="false"/>
            </column>
            <column name="currency" type="VARCHAR(5)">
                <constraints nullable="false"/>
            </column>
            <column name="category" type="VARCHAR(255)">
                <constraints nullable="false"/>
            </column>
            <column name="weight" type="VARCHAR(10)">
                <constraints nullable="false"/>
            </column>
        </createTable>
         * */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
