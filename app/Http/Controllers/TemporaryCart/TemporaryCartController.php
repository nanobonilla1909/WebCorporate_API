<?php

namespace App\Http\Controllers\TemporaryCart;

use App\TemporaryCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;

class TemporaryCartController extends ApiController
{

    public function index($user)
    {
        $temporary_cart = DB::table('temporary_carts')
                    ->join('temporary_cart_items','temporary_cart_items.temporary_cart_id','=','temporary_carts.id')
                    ->join('products','temporary_cart_items.product_id','=','products.id')
                    ->where('temporary_carts.user_id', $user)
                    ->select('temporary_carts.user_id',
                            'temporary_cart_items.id',
                            'temporary_cart_items.product_id',
                            'temporary_cart_items.quantity',
                            'temporary_cart_items.price',
                            'temporary_cart_items.discount_amount',
                            'temporary_cart_items.discount_percentage',
                            'products.name',
                            'products.image')
                    ->get();

        // return $this->showAll($characterized_products);
        return response()->json(['data' => $temporary_cart], 200);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(TemporaryCart $temporaryCart)
    {
        //
    }


    public function edit(TemporaryCart $temporaryCart)
    {
        //
    }


    public function update(Request $request, TemporaryCart $temporaryCart)
    {
        //
    }


    public function destroy(TemporaryCart $temporaryCart)
    {
        //
    }
}
