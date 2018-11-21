<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ProductType;


class ProductTypeCharacteristic extends Model
{
    protected $fillable = [
        'name',
        'product_type_id'
    ];


    public function product_type() {

        return $this->belongsTo(ProductType::class);
    }

}



