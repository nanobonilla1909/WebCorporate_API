<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\ProductCharacteristicOption;



class CharacterizedProduct extends Model
{

 	protected $fillable = [
        'product_id',
        'product_characteristic_option_id'
    ];


    public function product() {

        return $this->belongsTo(Product::class);
    }

    public function product_characteristic_option() {

        return $this->belongsTo(ProductCharacteristicOption::class);
    }
}

}
