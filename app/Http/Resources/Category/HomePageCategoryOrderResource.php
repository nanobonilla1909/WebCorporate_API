<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class HomePageCategoryOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
           return [
            'position' => $this->order,
            'product_category_id' => $this->product_category_id,
            'category_name' => $this->product_category->name
        ];

           
    }
}