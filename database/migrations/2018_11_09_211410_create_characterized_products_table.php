<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterizedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characterized_products', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('product_id');
            $table->unsignedInteger('product_characteristic_option_id');

            $table->string('deleted', 1)->default('0');
            $table->integer('created_by')->nullable();
            $table->timestamps();


            /* Foreign Keys */
        

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('product_characteristic_option_id')->references('id')->on('product_characteristic_options');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characterized_products');
    }
}
