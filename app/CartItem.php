<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Cart;
use App\Product;


class CartItem extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'product_id',
        'quantity',
        'cart_id',
        'price',
        'discount_amount',
        'discount_percentage'
    ];

 

    public function product() {

        return $this->hasOne(Product::class);
    }

    public function cart() {

        return $this->belongsTo(Cart::class);
    }

}

