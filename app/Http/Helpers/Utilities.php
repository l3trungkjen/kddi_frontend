<?php

namespace App\Http\Helpers;

use DateTime;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class Utilities
{
    public static function getCookie($key) {
        try {
            $hmac_prefixed = Crypt::decryptString(Cookie::get($key));
            $cookie_value = explode("|",$hmac_prefixed)[1];
            return $cookie_value;
        } catch (\Exception $e) {
            return null;
        }
    }
}
