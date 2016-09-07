<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $bankUrl;

    public function applicationResource() {
        return $this->belongsTo('App\ApplicationResource', 'application_resource_id');
    }

    /**
     * @return mixed
     */
    public function getBankUrl()
    {
        return $this->bankUrl;
    }

    /**
     * @param mixed $bankUrl
     */
    public function setBankUrl($bankUrl)
    {
        $this->bankUrl = $bankUrl;
    }
}
