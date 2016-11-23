<?php
/**
 * Created by PhpStorm.
 * User: rrybasov
 * Date: 22.11.2016
 * Time: 14:04
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CodDeliveryAddress extends Model
{
    public $id;
    public $country;
    public $region;
    public $city;
    public $address1;
    public $address2;
    public $postcode;

    public function __construct(array $attributes = [])
    {
        parent::__construct();
        foreach ($attributes as $key => $val)
            $this->setAttribute($key, $val);
    }

}