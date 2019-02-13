<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DeliveryType;
use App\PickupLocation;
use App\PickupLocationType;

class Delivery extends Model
{
    protected $fillable = [
		'delivery_type_id',
		'delivery_location_id',
		'delivery_availability',
		'delivery_comments'
		 ];

  	
}
