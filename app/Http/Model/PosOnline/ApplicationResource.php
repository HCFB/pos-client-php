<?php
/**
 * Created by PhpStorm.
 * User: RRybasov
 * Date: 26.08.2016
 * Time: 10:19
 */

namespace App\Http\Model\PosOnline;


class ApplicationResource extends HasLinks
{
    /**
     * @var string
     * */
    public $idApplication;
    /**
     * @var string|null
     * */
    public $evidSrv;
    /**
     * @var \App\Http\Model\PosOnline\ClientInfo
     * */
    public $clientInfo;
    /**
     * @var \App\Http\Model\PosOnline\Order
     * */
    public $order;
    /**
     * @var string
     * */
    public $status;
    /**
     * @var string|null
     * */
    public $cancelReason;
    /**
     * @var string|null
     * */
    public $maxLimit;

    /**
     * @return string
     */
    public function getIdApplication()
    {
        return $this->idApplication;
    }

    /**
     * @param string $idApplication
     */
    public function setIdApplication($idApplication)
    {
        $this->idApplication = $idApplication;
    }

    /**
     * @return string|null
     */
    public function getEvidSrv()
    {
        return $this->evidSrv;
    }

    /**
     * @param string|null $evidSrv
     */
    public function setEvidSrv($evidSrv)
    {
        $this->evidSrv = $evidSrv;
    }

    /**
     * @return ClientInfo
     */
    public function getClientInfo()
    {
        return $this->clientInfo;
    }

    /**
     * @param ClientInfo $clientInfo
     */
    public function setClientInfo(ClientInfo $clientInfo)
    {
        $this->clientInfo = $clientInfo;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param Order $order
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;
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
     * @return string|null
     */
    public function getCancelReason()
    {
        return $this->cancelReason;
    }

    /**
     * @param string|null $cancelReason
     */
    public function setCancelReason($cancelReason)
    {
        $this->cancelReason = $cancelReason;
    }

    /**
     * @return string|null
     */
    public function getMaxLimit()
    {
        return $this->maxLimit;
    }

    /**
     * @param string|null $maxLimit
     */
    public function setMaxLimit($maxLimit)
    {
        $this->maxLimit = $maxLimit;
    }
}