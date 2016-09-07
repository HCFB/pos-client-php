<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationResource extends Model
{
    public $idApplication;
    public $evidSrv;
    public function application() {
        return $this->hasOne('App\Application');
    }
    public function clientInfo() {
        return $this->belongsTo('App\ClientInfo');
    }
    public function order() {
        return $this->belongsTo('App\Order');
    }
    public $status;
    public $cancelReason;
    public $maxLimit;
}
