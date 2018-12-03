<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HighlightedItem extends Model
{
     protected $fillable = [
        'order',
        'title',
        'image',
        'link_to'
    ];

}
