<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->string('description');
            $table->integer('quantity');
            $table->float('price_list');
            $table->float('price');
            $table->float('subtotal');
            $table->string('discount_label')->nullable();
            $table->float('discount_subtotal')->nullable();
            $table->boolean('is_a_gift')->nullable();
            
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();


            /* Foreign Keys */
        
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
