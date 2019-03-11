<?php

namespace App\Http\Controllers\TemporaryCart;

use App\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CartItemController extends Controller
{
    //
    public function index($id)
    {
       
    }


    // public function store(Request $request)
    // {
    //     $campos = $request->all();

    //     $cart_item = CartItem::create($campos);

    //     return response()->json(['data' => $cart_item], 201);
    // }


    public function store(Request $request)
    {


        $campos = $request->all();
        $cart_id = $request->input('cart_id');
        $product_id = $request->input('product_id');
        $input_quantity = $request->input('quantity');
       



        $cart_item = CartItem::where('product_id', $product_id)
            ->where('cart_id', $cart_id)
            ->first();

        if (empty($cart_item)) {

            $new_cart_item = CartItem::create($campos);

            return response()->json(['data' => $new_cart_item], 201);

        } else {

            $old_quantity = $cart_item->quantity;
            if ($input_quantity == 1) {
                $new_quantity = $old_quantity + 1;
                
            } else {
                $new_quantity = $old_quantity - 1;
                
            }

            $cart_item->quantity = $new_quantity;

            $cart_item->save();

            return response()->json(['data' => $cart_item, $old_quantity, $new_quantity], 200);

        }
        

            // return response()->json(['nombre' => $name, 'mensaje' => "Es para ver si funciona: "], 200);

    }


    public function update(Request $request, $id)
    {
        $cart_item = CartItem::findorFail($id);

        if ($request->has('quantity')) {
            $cart_item->quantity = $request->quantity;
        }

        if (!$cart_item->isDirty()) {
            return response()->json(['error' => 'Se debe especificar al menos un valor para actualizar', 'code' => 422], 422);
        }

        $cart_item->save();

        return response()->json(['data' => $cart_item], 200);

    }


    public function destroy($id)
    {

        $cart_item = CartItem::findorFail($id);

        $cart_item->delete();

        return response()->json(['data' => $cart_item], 200);

    }


}
