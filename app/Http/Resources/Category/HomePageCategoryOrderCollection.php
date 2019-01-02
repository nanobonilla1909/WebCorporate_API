<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\Resource;

class HomePageCategoryOrderCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'position' => $this->order,
            'product_category_id' => $this->product_category_id,
            'category_name' => $this->product_category->name,
            'category_icon' => $this->product_category->icon
        ];

           

    }
}
