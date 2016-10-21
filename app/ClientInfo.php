<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientInfo extends Model
{
    public $email;
    public $firstName;
    public $lastName;
    public $middleName;
    public $phone;
    public $sex;

    public function __construct(array $attributes = [])
    {
        parent::__construct();
        foreach ($attributes as $key => $val)
        $this->setAttribute($key, $val);
    }
}
