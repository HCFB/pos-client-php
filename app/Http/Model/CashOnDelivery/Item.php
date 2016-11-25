<?php

namespace App\Http\Model\CashOnDelivery;

class Item {
    /**
     * @var string
     */
    public $name;
    /**
     * @var integer
     */
    public $quantity;
    /**
     * @var string
     */
    public $seller;
    /**
     * @var Price
     */
    public $itemPrice;
    /**
     * @var string
     */
    public $category;
    /**
     * @var string
     */
    public $weight;
}
