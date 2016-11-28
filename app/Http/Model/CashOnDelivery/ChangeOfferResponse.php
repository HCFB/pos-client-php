<?php
/**
 * Created by PhpStorm.
 * User: jbyh
 * Date: 25.11.16
 * Time: 16:27
 */

namespace App\Http\Model\CashOnDelivery;


class ChangeOfferResponse
{
    /**
     * @var ExLink[]
     */
    public $links;

    /**
     * @return ExLink[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param ExLink[] $links
     */
    public function setLinks($links)
    {
        $this->links = $links;
    }  
    
}