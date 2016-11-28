<?php
/**
 * Created by PhpStorm.
 * User: jbyh
 * Date: 25.11.16
 * Time: 16:08
 */

namespace App\Http\Model\CashOnDelivery;


class ChangeOfferRequest
{
    /**
     * @var string
     */
    public $status;

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
    
    
}