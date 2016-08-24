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
}