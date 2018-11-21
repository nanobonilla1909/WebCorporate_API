<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class FeaturedProducts extends Model
{
    protected $fillable = [
        'position',
        'product_id'
    ];


      /* Relaciones */

    public function product() {

        return $this->hasOne(Product::class);
    }
}


