<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('description')->nullable();
            $table->float('price')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active');

            $table->unsignedInteger('product_category_id');
            $table->unsignedInteger('product_type_id');


            $table->string('deleted', 1)->default('0');
            $table->integer('created_by')->nullable();
            $table->timestamps();


            /* Foreign Keys */

            $table->foreign('product_category_id')->references('id')->on('product_categories');

            $table->foreign('product_type_id')->references('id')->on('product_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
