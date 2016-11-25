<?php

namespace App\Http\Model\CashOnDelivery;

class OfferResponse {
    /**
     * @var integer
     */
    public $id;
    /**
     * @var mixed
     */
    public $validTo;
    /**
     * @var string
     */
    public $status;
    /**
     * @var double
     */
    public $servicePrice;
    /**
     * @var double
     */
    public $goodsPrice;
    /**
     * @var double
     */
    public $totalPrice;
    /**
     * @var string
     */
    public $currency;
    /**
     * @var ExLink[]
     */
    public $links;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getValidTo()
    {
        return $this->validTo;
    }

    /**
     * @param mixed $validTo
     */
    public function setValidTo($validTo)
    {
        $this->validTo = $validTo;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return float
     */
    public function getServicePrice()
    {
        return $this->servicePrice;
    }

    /**
     * @param float $servicePrice
     */
    public function setServicePrice($servicePrice)
    {
        $this->servicePrice = $servicePrice;
    }

    /**
     * @return float
     */
    public function getGoodsPrice()
    {
        return $this->goodsPrice;
    }

    /**
     * @param float $goodsPrice
     */
    public function setGoodsPrice($goodsPrice)
    {
        $this->goodsPrice = $goodsPrice;
    }

    /**
     * @return float
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @param float $totalPrice
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return ExLink[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param ExLink[] $links
     */
    public function setLinks($links)
    {
        $this->links = $links;
    }
    
    
}
