<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomePageCategoryOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_category_orders', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('order')->unsigned();   
            $table->unsignedInteger('product_category_id');

            $table->timestamps();

            /* Foreign Keys */

            $table->foreign('product_category_id')->references('id')->on('product_categories');
    
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_page_category_orders');
    }
}
