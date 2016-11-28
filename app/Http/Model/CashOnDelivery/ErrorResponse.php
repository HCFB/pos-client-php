<?php
/**
 * Created by PhpStorm.
 * User: jbyh
 * Date: 28.11.16
 * Time: 14:27
 */

namespace App\Http\Model\CashOnDelivery;


class ErrorResponse
{
    public $message;

    /**
     * ErrorResponse constructor.
     * @param string $string
     */
    public function __construct($string)
    {
        $this->message = $string;
    }
}