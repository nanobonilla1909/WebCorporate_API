<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class FeaturedProductCollection extends Resource
{

    public function toArray($request)
    {
        return [
            	// los nombres podrian ser distintos a los nombres de los campos originales
            'position' => $this->position,  
            'id' => $this->product_id,
            'name' => $this->product->name,
            'price' => $this->product->price,
            'image' => $this->product->image,

        ];
    }
}
