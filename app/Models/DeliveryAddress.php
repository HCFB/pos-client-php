<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    public $address;
    public $code;

    public function __construct(array $attributes = [])
    {
        parent::__construct();
        foreach ($attributes as $key => $val)
            $this->setAttribute($key, $val);
    }
}
