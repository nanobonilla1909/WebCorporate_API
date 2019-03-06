<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CompanyController extends ApiController
{
   
     public function index()
    {
        $companies = Company::all();

        // return response()->json(['data' => $companies], 200);
        return $this->showAll($companies);
    }


   
    public function show(Company $company)
    {
        //
    }
}
