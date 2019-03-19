<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        //
    }


   
    public function store(Request $request)
    {
        $order = new Order;
        $order->order_number = $request->order_number;
        $order->order_type_id = $request->order_type_id;
        $order->customer_id = $request->customer_id;
        $order->payment_method_id = $request->payment_method_id;
        $order->quotes = $request->quotes;
        $order->bank_id = $request->bank_id;
        $order->token = $request->token;
        $order->total = $request->total;
        $order->order_status_id = $request->order_status_id;
        $order->delivery_id = $request->delivery_id;
        $order->code_auth = $request->code_auth;
        $order->site_transaction_id = $request->site_transaction_id;
        $order->card = $request->card;
        $order->card_number = $request->card_number;
        $order->ticket = $request->ticket;
        $order->number_operation = $request->number_operation;
        $order->comments = $request->comments;
        $order->is_for_gift = $request->is_for_gift;
        $order->bill_status = $request->bill_status;
        $order->bill = $request->bill;
        $order->bill_number = $request->bill_number;
        $order->save();

        // --- Esto funciona perfecto para un item

        // $new_item = $request->item;

        // $obj= new OrderItem();

        // pasa lo que leyo de la request (array) al formato de objeto
        // foreach ($new_item as $k=> $v) {
        //     $obj->{$k} = $v;
        // };

        // info($obj);

        // $order->order_items()->save($obj);
            

        // - Para Varios items
        
        $new_items = $request->order_items;
        info($new_items);

        foreach ($new_items as $new_item) {
            $obj= new OrderItem();

            foreach ($new_item as $k=> $v) {
                $obj->{$k} = $v;
            };

            $order->order_items()->save($obj);

        }



        return response ([

            'data' => $order,
            'items' => $new_item

        ], 201);
    }

    
    public function show(Order $order)
    {
        //
    }

   
    public function update(Request $request, Order $order)
    {
        //
    }


    public function destroy(Order $order)
    {
        //
    }
}
