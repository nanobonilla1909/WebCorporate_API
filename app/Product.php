<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ProductCategory;
use App\ProductType;
use App\CharacterizedProduct;
use App\FeaturedProduct;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'product_category_id',
        'product_type_id',
        'is_active'
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

    public function featured_product() {

        return $this->hasOne(FeaturedProduct::class);
    }



}

