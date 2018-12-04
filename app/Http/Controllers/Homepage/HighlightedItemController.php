<?php

namespace App\Http\Controllers\Homepage;

use App\HighlightedItem;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;


class HighlightedItemController extends ApiController
{

    public function index()
    {
        $highlighted_items = HighlightedItem::all();

        return $this->showAll($highlighted_items);
    }

 
}
