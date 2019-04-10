<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Order;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;


class UserOrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        
        $orders = Order::where('customer_id', $user->id)->get();
        // $orders = Order::all();

         return response()->json(['data' => $orders], 200);

        // return $this->showAll($orders);
    }



  
}
