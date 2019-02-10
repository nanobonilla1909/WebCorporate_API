<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BankBenefit;

class Bank extends Model
{
     protected $fillable = [
		'name',
		'commerce_number',
		'color',
		'background',
		'is_active'
		 ];


	public function bank_benefits() {

        return $this->hasMany(BankBenefit::class);
    }
}
