<?php

namespace App\Http\Model\CashOnDelivery;

/**
 * Class Price
 * @package App\Http\Model\CashOnDelivery 
 */
class Price {
    /**
     * @var mixed
     */
    public $amount;
    /**
     * @var string
     */
    public $currency;

    /**
     * @return Price.
     * @param $amount
     * @param $currency
     */
    public static function withAllArgs($amount, $currency)
    {
        $instance = new Price();
        $instance->amount = $amount;
        $instance->currency = $currency;
        return $instance;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
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
}
