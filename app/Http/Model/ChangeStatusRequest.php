<?php
/**
 * Created by PhpStorm.
 * User: RRybasov
 * Date: 02.09.2016
 * Time: 11:54
 */

namespace App\Http\Model;


class ChangeStatusRequest
{
    /**
     * @var string
     */
    public $status;
    /**
     * @var string
     */
    public  $cancelReason;

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
     * @return string
     */
    public function getCancelReason()
    {
        return $this->cancelReason;
    }

    /**
     * @param string $cancelReason
     */
    public function setCancelReason($cancelReason)
    {
        $this->cancelReason = $cancelReason;
    }


}