<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class UserDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user_deliveries = DB::table('users')
                    ->leftJoin('companies','users.company_id','=','companies.id')
                    ->join('company_deliveries','companies.id','=','company_deliveries.company_id')
                    ->join('deliveries','company_deliveries.delivery_id','=','deliveries.id')
                    ->join('delivery_locations','deliveries.delivery_location_id','=','delivery_locations.id')
                    ->join('delivery_types','deliveries.delivery_type_id','=','delivery_types.id')
                    ->where('users.id', $user->id)
                    ->select('users.id', 'users.name as user_name',
                            'users.email',
                            'users.company_id', 'companies.name',
                            'company_deliveries.delivery_id',
                            'delivery_types.name as delivery_type',
                            'delivery_locations.name as delivery_location',
                            'delivery_locations.address',
                            'deliveries.delivery_availability',
                            'deliveries.comments')
                    ->get();

        return response()->json(['data' => $user_deliveries], 200);
    }



  
}
