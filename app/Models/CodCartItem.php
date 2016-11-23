<?php
/**
 * Created by PhpStorm.
 * User: rrybasov
 * Date: 22.11.2016
 * Time: 14:13
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CodCartItem extends Model 
{
    public $id;
    public $name;
    public $quantity;
    public $seller;
    public $amount;
    public $currency;
    public $category;
    public $weight;

    public function __construct(array $attributes = [])
    {
        parent::__construct();
        foreach ($attributes as $key => $val) {
            $this->setAttribute($key, $val);
        }
    }
}