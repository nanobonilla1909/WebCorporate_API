<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\BankBenefit;

class Bank extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

     protected $fillable = [
		'name',
		'commerce_number',
		'color',
		'background',
		'logo',
		'is_active'
		 ];


	public function bank_benefits() {

        return $this->hasMany(BankBenefit::class);
    }
}
