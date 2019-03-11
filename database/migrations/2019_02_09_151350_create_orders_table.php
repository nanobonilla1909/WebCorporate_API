<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('order_number');
            $table->unsignedInteger('order_type_id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('payment_method_id');
            $table->unsignedInteger('quotes');
            $table->unsignedInteger('bank_id');
            $table->string('token')->nullable();
            $table->float('total');
            $table->unsignedInteger('order_status_id');
            $table->unsignedInteger('delivery_id');
            $table->string('code_auth')->nullable();
            $table->integer('site_transaction_id')->nullable();
            $table->string('card')->nullable();
            $table->unsignedInteger('card_number');
            $table->string('ticket')->nullable();
            $table->unsignedInteger('number_operation')->nullable();
            $table->text('comments')->nullable();
            $table->boolean('is_for_gift')->nullable();
            $table->string('bill_status')->nullable();
            $table->string('bill')->nullable();
            $table->unsignedInteger('bill_number')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();


            /* Foreign Keys */
        
            $table->foreign('order_type_id')->references('id')->on('order_types');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
            $table->foreign('delivery_id')->references('id')->on('deliveries');

           
        });
    }


    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
