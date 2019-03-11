<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\OrderType;
use App\OrderItem;
use App\User;
use App\PaymentMethod;
use App\Bank;
use App\OrderStatus;
use App\Delivery;



class Order extends Model
{

	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
    protected $fillable = [
       
        'order_number',
		'order_type_id',
		'customer_id',
		'payment_method_id',
		'quotes',
		'bank_id',
		'token',
		'total',
		'order_status_id',
		'delivery_id',
		'code_auth',
		'site_transaction_id',
		'card',
		'card_number',
		'ticket',
		'number_operation',
		'comments',
		'is_for_gift',
		'bill_status',
		'bill',
		'bill_number'

    ];

  	public function order_type() {

        return $this->belongsTo(OrderType::class);
    }


 	public function customer() {

        return $this->belongsTo(User::class);
    }

 	public function payment_method() {

        return $this->belongsTo(PaymentMethod::class);
    }

 	public function bank() {

        return $this->belongsTo(Bank::class);
    }

    public function order_status() {

        return $this->belongsTo(OrderStatus::class);
    }

    public function delivery() {

        return $this->hasOne(Delivery::class);
    }

    public function order_items() {

        return $this->hasMany(OrderItem::class);
    }

    
}
