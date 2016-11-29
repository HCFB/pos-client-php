<?php

/**
 * Created by PhpStorm.
 * User: RRybasov
 * Date: 05.09.2016
 * Time: 15:18
 */

namespace App\Utils;

use App\Http\Model\PosOnline\ApplicationResponse;
use App\Models\Application;
use App\Models\ApplicationResource;
use App\Models\ClientInfo;
use App\Models\DeliveryAddress;
use App\Models\Item;
use App\Models\Order;

class CustomMapper
{
    public static function saveToModel(ApplicationResponse $responseObject, Order $orderModel)
    {

        $clientInfo = new ClientInfo((array)  $responseObject->getApplicationResource()->getClientInfo());
        $clientInfo->save();

        $order = new Order();
        $order->setAttribute("id", $orderModel->getAttribute("id"));
        $order->setAttribute('orderDateComplete', date("Y-m-d H:i:s" ,$responseObject->getApplicationResource()->getOrder()->getOrderDateComplete() / 1000));
        $order->setAttribute('orderNum',$responseObject->getApplicationResource()->getOrder()->getOrderNum());
        $order->setAttribute('orderSum',$responseObject->getApplicationResource()->getOrder()->getOrderSum());
        $order->setAttribute('productCode',$responseObject->getApplicationResource()->getOrder()->getProductCode());
        $deliveryAddress = new DeliveryAddress((array) $responseObject->getApplicationResource()->getOrder()->getDeliveryAddress());
        $deliveryAddress->setAttribute("id", $orderModel->deliveryAddress->id);
        $deliveryAddress->update();
        $order->deliveryAddress()->associate($deliveryAddress);
        $order->update();

        $items = array();
        foreach ($responseObject->getApplicationResource()->getOrder()->getItems() as $item) {
            $newItem = new Item((array) $item);
            $newItem->order()->associate($order);
            $newItem->save();
            $items[] = $newItem;
        }

        $order->items()->saveMany($items);

        $applicationResource = new ApplicationResource();
        $applicationResource->setAttribute('idApplication',$responseObject->getApplicationResource()->getIdApplication());
        $applicationResource->clientInfo()->associate($clientInfo);
        $applicationResource->order()->associate($order);
        $applicationResource->setAttribute('status',$responseObject->getApplicationResource()->getStatus());
        $applicationResource->save();

        $application = new Application();
        $application->setAttribute("bankUrl", $responseObject->bankUrl);
        $application->applicationResource()->associate($applicationResource);
        $application->save();
    }
}