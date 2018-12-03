<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FeaturedProduct;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Product\FeaturedProductResource;
use App\Http\Resources\Product\FeaturedProductCollection;


class FeaturedProductController extends ApiController
{


    public function index()
    {

        // sin Resources

        /* $featured_products = FeaturedProduct::all();

        return $this->showAll($featured_products);
        */

        // con Resources

        return FeaturedProductCollection::collection(FeaturedProduct::all());



    }


    public function show(FeaturedProduct $featured_product)
    {
         return new FeaturedProductResource($featured_product);
    }

   
}
