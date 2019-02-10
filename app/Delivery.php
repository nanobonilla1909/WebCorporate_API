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
		'pick_up_location_type_id',
		'pick_up_location_id',
		'pick_up_availability',
		'delivery_availability',
		'delivery_address',
		'delivery_comments'
		 ];

  	public function pick_up_location_type() {

        return $this->belongsTo(PickupLocationType::class);
    }

    public function pick_up_location() {

        return $this->belongsTo(PickupLocation::class);
    }
}
