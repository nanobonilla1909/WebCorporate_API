<?php

namespace App\Http\Controllers\TemporaryCart;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function show($user)
    {
        $cart = DB::table('carts')
                    ->join('cart_items','cart_items.cart_id','=','carts.id')
                    ->join('products','cart_items.product_id','=','products.id')
                    ->where('carts.user_id', $user)
                    ->select('cart_items.id',
                            'cart_items.cart_id',
                            'cart_items.product_id',
                            'cart_items.quantity',
                            'cart_items.price',
                            'cart_items.discount_amount',
                            'cart_items.discount_percentage',
                            'products.name',
                            'products.description',
                            'products.image')
                    ->get();

        return response()->json(['data' => $cart], 200);
    }




    public function items_quantity($carrito)
    {

        $myselect = "SELECT SUM(quantity) AS items_quantity
            FROM cart_items
            WHERE cart_id = " . $carrito;
            

        $items_quantity = DB::select(DB::raw($myselect));

        return response()->json(['data' => $items_quantity], 200);
       
    }





    public function empty($carrito)
    {

        $myselect = "SELECT COUNT(*) AS items_quantity
            FROM cart_items
            WHERE cart_id = " . $carrito;
            

        $items_quantity = DB::select(DB::raw($myselect));


        if ($items_quantity > 0) {

            DB::table('cart_items')->where('cart_id', '=', $carrito)->delete();

        }
        

        $i = 5;
        return response()->json(['success' => "Se han borrado " . $items_quantity[0]->items_quantity . " items"], 200);
       
    }



    
}
