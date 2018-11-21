<?php

namespace App\Http\Controllers\ProductCategory;

use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProductCategoryController extends ApiController
{
    

    public function index()
    {
        $product_categories = ProductCategory::all();

        // Si quisiera traer solo las que tienen productos seria como abajo
        // $product_categories = ProductCategory::has('products')->get();

        // return response()->json(['data' => $product_categories], 200);
        return $this->showAll($product_categories);
    }


    public function show($id)
    {
        $product_category = ProductCategory::findOrFail($id);

        // return response()->json(['data' => $product_category], 200);
        return $this->showOne($product_category);
    }


    public function destroy($id)
    {
        //
    }
}
