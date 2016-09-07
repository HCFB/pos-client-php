<?php
/**
 * Created by PhpStorm.
 * User: RRybasov
 * Date: 26.08.2016
 * Time: 10:22
 */

namespace App\Http\Model;


class Link
{
    public $href;

    /**
     * @return mixed
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param mixed $href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }


}