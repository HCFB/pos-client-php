<?php
/**
 * Created by PhpStorm.
 * User: RRybasov
 * Date: 24.08.2016
 * Time: 14:34
 */

namespace App\Model;


class Item
{
    /**
     * @var string
     * */
    public $model;
    /**
     * @var string
     * */
    public $name;
    /**
     * @var string
     * */
    public $partnerGoodCatalog;
    /**
     * @var int
     * */
    public $price;
    /**
     * @var string
     * */
    public $producer;
    /**
     * @var int
     * */
    public $quantity;
    /**
     * @var int
     * */
    public $weight;
}