<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Bank;
use App\PaymentMethod;


class BankBenefit extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
  
     protected $fillable = [
      		'bank_id',
      		'payment_method_id',
      		'quotes',
      		'interest'
		 ];

  	public function bank() {

        return $this->belongsTo(Bank::class);
    }

    public function payment_method() {

        return $this->belongsTo(PaymentMethod::class);
    }
}
