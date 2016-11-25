<?php

namespace App\Http\Model\CashOnDelivery;

use FiveLab\Component\ModelTransformer\Annotation\Object;
use FiveLab\Component\ModelTransformer\Annotation\Property;

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


}
