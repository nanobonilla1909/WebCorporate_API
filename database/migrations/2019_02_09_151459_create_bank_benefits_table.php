    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_benefits', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('bank_id');
            $table->unsignedInteger('payment_method_id');
            $table->unsignedInteger('quotes')->nullable();
            $table->float('interest')->nullable();
            
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            
            /* Foreign Keys */
        
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('bank_id')->references('id')->on('banks');
        });
    }


    public function down()
    {
        Schema::dropIfExists('bank_benefits');
    }
}
