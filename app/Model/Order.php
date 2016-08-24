<?php
/**
 * Created by PhpStorm.
 * User: RRybasov
 * Date: 24.08.2016
 * Time: 14:34
 */

namespace App\Model;


class Order
{
    /**
     * @var \App\Model\DeliveryAddress
     * */
    public $deliveryAddress;
    /**
     * @var \App\Model\Item[]
     * */
    public $items;
    /**
     * @var string
     * */
    public $orderDateComplete;
    /**
     * @var string
     * */
    public $orderNum;
    /**
     * @var int
     * */
    public $orderSum;
    /**
     * @var string
     * */
    public $productCode;
}