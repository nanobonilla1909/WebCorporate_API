<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\CompanyDelivery;

class Company extends Model
{
    protected $fillable = [
		'name'
		 ];


	public function users() {

        return $this->hasMany(User::class);
    }

    public function company_deliveries() {

        return $this->hasMany(CompanyDelivery::class);
    }
}
