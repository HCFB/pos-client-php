<?php

namespace App\Http\Model\CashOnDelivery\Dto;


/**
 * @Object(transformedClass="App\Models\CodCartItem")
 *
 */
class ItemDTO {

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
     * @var \App\Http\Model\CashOnDelivery\Price
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
     * @return string
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * @param string $seller
     */
    public function setSeller($seller)
    {
        $this->seller = $seller;
    }

    /**
     * @return \App\Http\Model\CashOnDelivery\Price
     */
    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    /**
     * @param \App\Http\Model\CashOnDelivery\Price $itemPrice
     */
    public function setItemPrice($itemPrice)
    {
        $this->itemPrice = $itemPrice;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }    
}
