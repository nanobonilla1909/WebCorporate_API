<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;


class Cart extends Model
{

	use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_email',
        'user_id'
    ];

 

    public function user() {

        return $this->hasOne(User::class);
    }

}
