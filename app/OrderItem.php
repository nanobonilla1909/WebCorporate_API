<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Product;
use App\Order;


class OrderItem extends Model
{

	use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = [
		'order_id',
		'product_id',
		'description',
		'quantity',
		'price_list',
		'price',
		'subtotal',
		'discount_label',
		'discount_subtotal',
		'is_a_gift'

		 ];

	public function order() {

        return $this->belongsTo(Order::class);
    }

  	public function product() {

        return $this->belongsTo(Product::class);
    }

}
