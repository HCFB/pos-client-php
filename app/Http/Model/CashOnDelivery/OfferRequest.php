<?php

namespace App\Http\Model\CashOnDelivery;

use App\Http\Model\CashOnDelivery\Item;

class OfferRequest {

    public $shippingCompanyId;
    public $totalPrice;
    /**
     * @var Item[]
     */
    public $items;
    public $deliveryAddress;
    public $email;
    public $firstName;
    public $lastName;
    public $middleName;
    public $phone;
    public $shopOrderId;
    public $discountAmount;
    public $shippingCost;

    public $successUrl;
    public $failUrl;
}
