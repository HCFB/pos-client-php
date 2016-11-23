<?php
/**
 * Created by PhpStorm.
 * User: rrybasov
 * Date: 22.11.2016
 * Time: 13:57
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CodOffer extends Model
{
    public $id;
    public $remoteId;
    public $validTo;
    public $status;
    public $servicePrice;
    public $goodsPrice;
    public $totalPrice;
    public $currency;

    public function codDeliveryAddress() {
        return $this->hasOne('App\Models\CodDeliveryAddress');
    }

    public function codClientInfo() {
        return $this->hasOne('App\Models\CodClientInfo');
    }

    public function codCartItems() {
        return $this->hasMany('App\Models\CodCartItem');
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct();
        foreach ($attributes as $key => $val)
            $this->setAttribute($key, $val);
    }

}