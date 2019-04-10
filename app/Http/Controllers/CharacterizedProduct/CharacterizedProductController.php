<?php

namespace App\Http\Controllers\CharacterizedProduct;

use App\CharacterizedProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

use Illuminate\Support\Facades\DB;


class CharacterizedProductController extends ApiController
{


    public function get_selected_products(Request $request)
    {

         // $arr_products = $request->input('products');
        
          $arr_products = $request;

        // return $arr_products;


        $characterized_products = DB::table('characterized_products')
                    ->join('product_characteristic_options','characterized_products.product_characteristic_option_id','=','product_characteristic_options.id')
                    ->join('product_type_characteristics','product_characteristic_options.product_type_characteristic_id','=','product_type_characteristics.id')
                    ->whereIn('characterized_products.product_id', $arr_products)
                    ->select('characterized_products.id',
                            'characterized_products.product_id',
                            'characterized_products.product_characteristic_option_id as options_id',
                            'product_characteristic_options.value',
                            'product_characteristic_options.product_type_characteristic_id as type_id',
                            'product_type_characteristics.name')
                    ->get();

   

        // return $this->showAll($characterized_products);
        return response()->json(['data' => $characterized_products], 200);

    }
  
}
