<?php
/**
 * Created by PhpStorm.
 * User: RRybasov
 * Date: 24.08.2016
 * Time: 14:31
 */

namespace App\Http\Model;


class DeliveryAddress
{
    /**
     * @var string
     * */
    public $address;
    /**
     * @var string
     * */
    public $code;


    public function __construct()
    {

    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }


}
