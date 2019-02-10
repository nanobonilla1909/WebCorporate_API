<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bank;
use App\PaymentMethod;


class BankBenefit extends Model
{
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
