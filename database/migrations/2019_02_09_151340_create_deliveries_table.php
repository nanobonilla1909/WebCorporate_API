<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('delivery_type_id');
            $table->unsignedInteger('delivery_location_id');
            $table->string('delivery_availability');
            $table->string('comments');

            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /* Foreign Keys */
        
            $table->foreign('delivery_type_id')->references('id')->on('delivery_types');
        });
    }



    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
