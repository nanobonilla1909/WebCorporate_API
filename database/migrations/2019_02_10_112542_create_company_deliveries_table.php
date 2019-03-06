<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_deliveries', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('company_id');
            $table->unsignedInteger('delivery_id');
            
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /* Foreign Keys */
        
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('delivery_id')->references('id')->on('deliveries');

        });
    }



    public function down()
    {
        Schema::dropIfExists('company_deliveries');
    }
}
