<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{


    public $model;

    public $name;

    public $partnerGoodCatalog;

    public $price;

    public $producer;

    public $quantity;

    public $weight;

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct();
        foreach ($attributes as $key => $val)
            $this->setAttribute($key, $val);
    }
}
