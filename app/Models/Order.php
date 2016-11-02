<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function deliveryAddress() {
        return $this->belongsTo('App\Models\DeliveryAddress');
    }
    public function items() {
        return $this->hasMany('App\Models\Item');
    }
    public $orderDateComplete;
    public $orderNum;
    public $orderSum;
    public $productCode;
}
