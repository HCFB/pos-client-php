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
        return $this->hasOne('App\Models\CodDeliveryAddress', "id");
    }

    public function codUserInfo() {
        return $this->hasOne('App\Models\CodUserInfo', "id");
    }

    public function codCartItems() {
        return $this->hasMany('App\Models\CodCartItem', "offer_id");
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct();
        foreach ($attributes as $key => $val) {
            if(array_key_exists($key, get_class_vars(get_class($this))))
                $this->setAttribute($key, $val);
        }
    }

}