<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

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


}
