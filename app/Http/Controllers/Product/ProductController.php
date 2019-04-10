<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;




class ProductController extends ApiController
{


    public function index()
    {
        $products = Product::all();

        // return response()->json(['data' => $products], 200);
        return $this->showAll($products);
    }

    public function getSearchResults($searchTerm) {

        $products = Product::where('name', 'like', "%{$searchTerm}%")
                 ->get();

        return $this->showAll($products);         


    }


}
