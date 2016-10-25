<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationResource extends Model
{
    public $idApplication;
    public $evidSrv;
    public function application() {
        return $this->hasOne('App\Models\Application');
    }
    public function clientInfo() {
        return $this->belongsTo('App\Models\ClientInfo');
    }
    public function order() {
        return $this->belongsTo('App\Models\Order');
    }
    public $status;
    public $cancelReason;
    public $maxLimit;
}
