<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCharacteristicOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_characteristic_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->unsignedInteger('product_type_characteristic_id');


            $table->string('deleted', 1)->default('0');
            $table->integer('created_by')->nullable();
            $table->timestamps();


            /* Foreign Keys */

            $table->foreign('product_type_characteristic_id','pt_char_id')->references('id')->on('product_type_characteristics');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_characteristic_options');
    }
}
