<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\HomePageCategoryOrder;

class ProductCategory extends Model
{
    protected $fillable = [
        'code',
        'name',
        'image',
        'icon',
        'depth',
        'left',
        'right,'
    ];

    public function products() {

        return $this->hasMany(Product::class);
    }


    public function home_page_category_order() {

        return $this->hasOne(HomePageCategoryOrder::class);
    }

}
