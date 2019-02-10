<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PickUpLocation;


class PickUpLocationType extends Model
{
    protected $fillable = [
        'name',
    ];


    public function pick_up_locations() {

        return $this->hasMany(PickUpLocation::class);
    }
}
