<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FeaturedProduct;
use App\Http\Controllers\ApiController;

class FeaturedProductController extends ApiController
{


    public function index()
    {
         $featured_products = FeaturedProduct::all();

        
        return $this->showAll($featured_products);
    }

   
}
