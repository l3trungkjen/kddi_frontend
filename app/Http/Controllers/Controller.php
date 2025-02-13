<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Utilities;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;

abstract class Controller extends BaseController
{
    /**
     * @var array
     */
    public $data = [];

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __construct()
    {
        $this->token = Cookie::get('token');
        $this->user_token = Utilities::getCookie('user_token');
    }
}
