<?php
/**
 * Created by PhpStorm.
 * User: RRybasov
 * Date: 24.08.2016
 * Time: 14:34
 */

namespace App\Model;


class Order
{
    /**
     * @var \App\Model\DeliveryAddress
     * */
    public $deliveryAddress;
    /**
     * @var \App\Model\Item[]
     * */
    public $items;
    /**
     * @var string
     * */
    public $orderDateComplete;
    /**
     * @var string
     * */
    public $orderNum;
    /**
     * @var float
     * */
    public $orderSum;
    /**
     * @var string
     * */
    public $productCode;

    /**
     * @return DeliveryAddress
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param DeliveryAddress $deliveryAddress
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;
    }

    /**
     * @return Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return string
     */
    public function getOrderDateComplete()
    {
        return $this->orderDateComplete;
    }

    /**
     * @param string $orderDateComplete
     */
    public function setOrderDateComplete($orderDateComplete)
    {
        $this->orderDateComplete = $orderDateComplete;
    }

    /**
     * @return string
     */
    public function getOrderNum()
    {
        return $this->orderNum;
    }

    /**
     * @param string $orderNum
     */
    public function setOrderNum($orderNum)
    {
        $this->orderNum = $orderNum;
    }

    /**
     * @return float
     */
    public function getOrderSum()
    {
        return $this->orderSum;
    }

    /**
     * @param float $orderSum
     */
    public function setOrderSum($orderSum)
    {
        $this->orderSum = $orderSum;
    }

    /**
     * @return string
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @param string $productCode
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    }

}