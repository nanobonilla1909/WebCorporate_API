<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductTypeCharacteristic;
use App\Product;

class ProductType extends Model
{
    protected $fillable = [
        'name',
    ];


    public function products() {

        return $this->hasMany(Product::class);
    }

    public function product_type_characteristics() {

        return $this->hasMany(ProductTypeCharacteristic::class);
    }

}
