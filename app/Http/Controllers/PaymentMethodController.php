<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Resources\PaymentMethodResource;


class PaymentMethodController extends Controller
{
   
     public function index()
    {
        
    }


   
    public function show(PaymentMethod $paymentMethod)
    {

        return new PaymentMethodResource($paymentMethod);
    }


}




