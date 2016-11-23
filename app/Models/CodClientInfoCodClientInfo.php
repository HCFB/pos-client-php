<?php
/**
 * Created by PhpStorm.
 * User: rrybasov
 * Date: 22.11.2016
 * Time: 14:08
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CodClientInfoCodClientInfo extends Model
{
    public $id;
    public $email;
    public $firstName;
    public $lastName;
    public $middleName;
    public $phone;

    public function __construct(array $attributes = [])
    {
        parent::__construct();
        foreach ($attributes as $key => $val)
            $this->setAttribute($key, $val);
    }
}