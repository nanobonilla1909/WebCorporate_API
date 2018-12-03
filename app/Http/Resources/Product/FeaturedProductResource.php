<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class FeaturedProductResource extends JsonResource
{

    public function toArray($request)
    {
        return [

        	// los nombres podrian ser distintos a los nombres de los campos originales
            'position' => $this->position,  
            'product_id' => $this->product_id,
            'product_name' => $this->product->name,
            'product_price' => $this->product->price,
            'product_image' => $this->product->image,

        ];
    }
}
