<?php

namespace App\Http\Controllers\ProductCategory;

use App\HomePageCategoryOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class HomePageCategoryOrderController extends ApiController
{

    public function index()
     {
         $home_page_category_orders = HomePageCategoryOrder::all();

        
        return $this->showAll($home_page_category_orders);
    }


   
}
