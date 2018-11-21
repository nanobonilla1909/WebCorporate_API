<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePageCategoryOrder extends Model
{
     protected $fillable = [
        'order',
        'category_id'
    ];


      /* Relaciones */

    public function product_category() {

        return $this->hasOne(ProductCategory::class);
    }
}
