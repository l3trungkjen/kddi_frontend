<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    // 01_login.html
    public function login(Request $request)
    {
        return view('auth.login', $this->data);
    }

    // 03-2_pw_forget.html
    public function forgetPassword(Request $request)
    {
        return view('auth.forget_password', $this->data);
    }

    // 04_base.html
    public function user(Request $request)
    {
        return view('user.index', $this->data);
    }

    // 03_login_user.html
    public function loginUser(Request $request)
    {
        return view('user.login', $this->data);
    }
}
