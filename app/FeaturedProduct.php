<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class FeaturedProduct extends Model
{
    protected $fillable = [
        'position',
        'product_id'
    ];


      /* Relaciones */

    public function product() {

        return $this->belongsTo(Product::class);
    }
}


