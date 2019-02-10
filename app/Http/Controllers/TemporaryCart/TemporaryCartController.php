<?php

namespace App\Http\Controllers\TemporaryCart;

use App\TemporaryCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TemporaryCartController extends Controller
{

    public function show($user)
    {
        $temporary_cart = DB::table('temporary_carts')
                    ->join('temporary_cart_items','temporary_cart_items.temporary_cart_id','=','temporary_carts.id')
                    ->join('products','temporary_cart_items.product_id','=','products.id')
                    ->where('temporary_carts.user_id', $user)
                    ->select('temporary_cart_items.id',
                            'temporary_cart_items.temporary_cart_id',
                            'temporary_cart_items.product_id',
                            'temporary_cart_items.quantity',
                            'temporary_cart_items.price',
                            'temporary_cart_items.discount_amount',
                            'temporary_cart_items.discount_percentage',
                            'products.name',
                            'products.description',
                            'products.image')
                    ->get();

        return response()->json(['data' => $temporary_cart], 200);
    }




    public function items_quantity($carrito)
    {

        $myselect = "SELECT SUM(quantity) AS items_quantity
            FROM temporary_cart_items
            WHERE temporary_cart_id = " . $carrito;
            

        $items_quantity = DB::select(DB::raw($myselect));

        return response()->json(['data' => $items_quantity], 200);
       
    }





    public function empty($carrito)
    {

        $myselect = "SELECT COUNT(*) AS items_quantity
            FROM temporary_cart_items
            WHERE temporary_cart_id = " . $carrito;
            

        $items_quantity = DB::select(DB::raw($myselect));


        if ($items_quantity > 0) {

            DB::table('temporary_cart_items')->where('temporary_cart_id', '=', $carrito)->delete();

        }
        

        $i = 5;
        return response()->json(['success' => "Se han borrado " . $items_quantity[0]->items_quantity . " items"], 200);
       
    }



    
}
