<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            // $table->increments('id');
            $table->integer('id')->unsigned()->primary();
            $table->string('name');
            $table->string('code');
            $table->integer('depth')->unsigned();
            $table->integer('left')->unsigned();
            $table->integer('right')->unsigned();
            $table->string('image');
            $table->string('icon');


            $table->string('deleted', 1)->default('0');
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('product_categories');
    }
}
