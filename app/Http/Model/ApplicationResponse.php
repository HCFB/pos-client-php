<?php
/**
 * Created by PhpStorm.
 * User: RRybasov
 * Date: 26.08.2016
 * Time: 10:17
 */

namespace App\Http\Model;


class ApplicationResponse
{
    /**
     * @var string
     * */
    public $bankUrl;
    /**
     * @var \App\Http\Model\ApplicationResource
     * */
    public $applicationResource;

    /**
     * @return string
     */
    public function getBankUrl()
    {
        return $this->bankUrl;
    }

    /**
     * @param string $bankUrl
     */
    public function setBankUrl($bankUrl)
    {
        $this->bankUrl = $bankUrl;
    }

    /**
     * @return ApplicationResource
     */
    public function getApplicationResource()
    {
        return $this->applicationResource;
    }

    /**
     * @param ApplicationResource $applicationResource
     */
    public function setApplicationResource(ApplicationResource $applicationResource)
    {
        $this->applicationResource = $applicationResource;
    }


}