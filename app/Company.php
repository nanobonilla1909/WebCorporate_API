<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\CompanyDelivery;

class Company extends Model
{

	use SoftDeletes;

	protected $dates = ['deleted_at'];
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
