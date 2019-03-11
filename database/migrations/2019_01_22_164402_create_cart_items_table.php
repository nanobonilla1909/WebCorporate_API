<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('cart_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('quantity');
            $table->float('price');
            $table->float('discount_amount')->nullable();
            $table->float('discount_percentage')->nullable();

            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /* Foreign Keys */
        
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('cart_id')->references('id')->on('carts');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
