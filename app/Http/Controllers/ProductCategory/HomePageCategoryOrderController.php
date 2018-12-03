<?php

namespace App\Http\Controllers\ProductCategory;

use App\HomePageCategoryOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Category\HomePageCategoryOrderResource;
use App\Http\Resources\Category\HomePageCategoryOrderCollection;

class HomePageCategoryOrderController extends ApiController
{

    public function index()
     {
         
        // usando Resources
         
        return HomePageCategoryOrderCollection::collection(HomePageCategoryOrder::orderBy('order')->get());



        // sin usar Resources


        /*
        $home_page_category_orders = HomePageCategoryOrder::all();
        
        return $this->showAll($home_page_category_orders); */
    }


   
}
