<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryLocation extends Model
{
        protected $fillable = [
        'name',
        'address'
    ];

}
