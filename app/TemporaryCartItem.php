<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TemporaryCart;
use App\Product;


class TemporaryCartItem extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'temporary_cart_id',
        'price',
        'discount_amount',
        'discount_percentage'
    ];

 

    public function product() {

        return $this->hasOne(Product::class);
    }

    public function temporary_cart() {

        return $this->belongsTo(TemporaryCart::class);
    }

}

