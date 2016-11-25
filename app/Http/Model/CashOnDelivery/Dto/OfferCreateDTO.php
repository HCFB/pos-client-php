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

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param string $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return string
     */
    public function getShippingCompanyId()
    {
        return $this->shippingCompanyId;
    }

    /**
     * @param string $shippingCompanyId
     */
    public function setShippingCompanyId($shippingCompanyId)
    {
        $this->shippingCompanyId = $shippingCompanyId;
    }

    /**
     * @return ItemDTO[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param ItemDTO[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }
    
    
}
