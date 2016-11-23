<?php

namespace App\Http\Model\CashOnDelivery\Dto;

class OfferCreateDTO {
    /**
     * @var string
     * */
    public $email;
    /**
     * @var string
     * */
    public $firstName;
    /**
     * @var string
     * */
    public $lastName;
    /**
     * @var string
     * */
    public $middleName;
    /**
     * @var string
     * */
    public $phone;
    /**
     * @var string
     * */
    public $address1;
    /**
     * @var string
     * */
    public $address2;
    /**
     * @var string
     * */
    public $city;
    /**
     * @var string
     * */
    public $country;
    /**
     * @var string
     * */
    public $region;
    /**
     * @var string
     * */
    public $postcode;
    /**
     * @var string
     * */
    public $shippingCompanyId;
    /**
     * @var ItemDTO[]
     * */
    public $items;
}
