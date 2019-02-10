<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class OrderType extends Model
{
    protected $fillable = [
        'name',
    ];


    public function orders() {

        return $this->hasMany(Order::class);
    }

}
