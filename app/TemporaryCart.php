<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class TemporaryCart extends Model
{
    protected $fillable = [
        'user_email',
        'user_id'
    ];

 

    public function user() {

        return $this->hasOne(User::class);
    }

}
