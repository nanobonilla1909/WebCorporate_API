<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ProductCategory;
use App\ProductType;
use App\CharacterizedProduct;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'product_category_id',
        'product_type_id'
    ];


    /* Relaciones */

    public function product_category() {

        return $this->belongsTo(ProductCategory::class);
    }

    public function product_type() {

        return $this->belongsTo(ProductType::class);
    }

    public function characterized_products() {

        return $this->hasMany(CharacterizedProduct::class);
    }



}

