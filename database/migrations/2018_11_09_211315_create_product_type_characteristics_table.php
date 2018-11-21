<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTypeCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_type_characteristics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->unsignedInteger('product_type_id');

            $table->string('deleted', 1)->default('0');
            $table->integer('created_by')->nullable();
            $table->timestamps();


            /* Foreign Keys */

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
        Schema::dropIfExists('product_type_characteristics');
    }
}
