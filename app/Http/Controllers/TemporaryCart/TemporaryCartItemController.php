<?php


namespace App\Http\Controllers\TemporaryCart;

use App\TemporaryCartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;


class TemporaryCartItemController extends ApiController
{

    public function index($user)
    {
        $cart_items = DB::table('temporary_cart_items')
                    ->join('products','temporary_cart_items.product_id','=','products.id')
                    ->where('temporary_cart_items.user_id', $user)
                    ->select('temporary_cart_items.id',
                            'temporary_cart_items.product_id',
                            'temporary_cart_items.quantity',
                            'temporary_cart_items.price',
                            'temporary_cart_items.discount_amount',
                            'temporary_cart_items.discount_percentage',
                            'products.name',
                            'products.image')
                    ->get();

        // return $this->showAll($characterized_products);
        return response()->json(['data' => $cart_items], 200);

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, TemporaryCartItem $temporaryCartItem)
    {
        //
    }


    public function destroy(TemporaryCartItem $temporaryCartItem)
    {
        //
    }
}
