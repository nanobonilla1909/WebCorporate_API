<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PaymentMethod extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'name',
		'code',
		'icon',
		'order',
		'status'
		 ];


	public function bank_benefits() {

        return $this->hasMany(BankBenefit::class);
    }


}
