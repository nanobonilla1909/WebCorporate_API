<?php

namespace App\Http\Controllers;

use App\BankBenefit;
use App\Http\Resources\BankBenefitResource;
use Illuminate\Http\Request;



class BankBenefitController extends Controller
{
    
    public function index()
    {
    	$bbs = BankBenefit::all();

        // Asi funciona perfecto con Recursos
        return BankBenefitResource::collection(BankBenefit::all());



    }


   
    public function show(BankBenefit $bankBenefit)
    {
 	
        return new BankBenefitResource($bankBenefit);
    }

}



