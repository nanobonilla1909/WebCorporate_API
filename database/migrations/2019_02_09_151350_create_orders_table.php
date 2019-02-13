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

            $table->integer('order_number');
            $table->integer('order_type_id');
            $table->integer('customer_id');
            $table->integer('payment_method_id');
            $table->integer('quotes');
            $table->integer('bank_id');
            $table->string('token')->nullable;
            $table->float('total');
            $table->integer('order_status_id');
            $table->integer('delivery_id');
            $table->string('code_auth')->nullable;
            $table->integer('site_transaction_id')->nullable;
            $table->string('card')->nullable;
            $table->integer('card_number');
            $table->string('ticket')->nullable;
            $table->integer('number_operation')->nullable;
            $table->text('comments')->nullable;
            $table->boolean('is_for_gift')->nullable;
            $table->string('bill_status')->nullable;
            $table->string('bill')->nullable;
            $table->integer('bill_number')->nullable;
            
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
