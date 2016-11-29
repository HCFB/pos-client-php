<?php
/**
 * Created by PhpStorm.
 * User: rrybasov
 * Date: 22.11.2016
 * Time: 14:08
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CodUserInfo extends Model
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
        foreach ($attributes as $key => $val) {
            if(array_key_exists($key, get_class_vars(get_class($this))))
                $this->setAttribute($key, $val);
        }
    }
}