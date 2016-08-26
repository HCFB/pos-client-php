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

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPartnerGoodCatalog()
    {
        return $this->partnerGoodCatalog;
    }

    /**
     * @param string $partnerGoodCatalog
     */
    public function setPartnerGoodCatalog($partnerGoodCatalog)
    {
        $this->partnerGoodCatalog = $partnerGoodCatalog;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * @param string $producer
     */
    public function setProducer($producer)
    {
        $this->producer = $producer;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
}