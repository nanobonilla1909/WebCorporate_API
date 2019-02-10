<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporaryCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_cart_items', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('temporary_cart_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('quantity');
            $table->float('price');
            $table->float('discount_amount')->nullable;
            $table->float('discount_percentage')->nullable;

            $table->timestamps();

            /* Foreign Keys */
        
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('temporary_cart_id')->references('id')->on('temporary_carts');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporary_cart_items');
    }
}
