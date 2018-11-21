<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ProductTypeCharacteristic;
use App\CharacterizedProduct;

class ProductCharacteristicOption extends Model
{
    protected $fillable = [
        'value',
        'product_type_characteristic_id'
    ];

    public function product_type_characteristic() {

        return $this->belongsTo(ProductTypeCharacteristic::class);
    }

    public function characteristized_products() {

        return $this->hasMany(CharacterizedProduct::class);
    }

}
