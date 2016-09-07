<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function deliveryAddress() {
        return $this->belongsTo('App\DeliveryAddress');
    }
    public function items() {
        return $this->hasMany('App\Item');
    }
    public $orderDateComplete;
    public $orderNum;
    public $orderSum;
    public $productCode;
}
