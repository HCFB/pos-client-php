<?php
/**
 * Created by PhpStorm.
 * User: RRybasov
 * Date: 05.09.2016
 * Time: 10:12
 */

namespace App\Http\Model;


class HasLinks
{
    /**
     * @var \App\Http\Model\Link[]
     * */
    public $_links;

    /**
     * @return Link[]
     */
    public function getLinks()
    {
        return $this->_links;
    }

    /**
     * @param Link[] $links
     */
    public function setLinks(array $links)
    {
        $this->_links = $links;
    }
}