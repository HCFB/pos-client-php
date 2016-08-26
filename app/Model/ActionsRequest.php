<?php

/**
 * Created by PhpStorm.
 * User: RRybasov
 * Date: 24.08.2016
 * Time: 13:59
 */

namespace App\Model;

class ActionsRequest
{
    /**
     * @var \App\Model\ClientInfo
     * */
    public $clientInfo;
    /**
     * @var \App\Model\Order
     * */
    public $order;
    /**
     * @var string
     * */
    public $shopUrl;

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
    public function setClientInfo($clientInfo)
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
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getShopUrl()
    {
        return $this->shopUrl;
    }

    /**
     * @param string $shopUrl
     */
    public function setShopUrl($shopUrl)
    {
        $this->shopUrl = $shopUrl;
    }




}