<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        return redirect('/login');
    }

    // 02_base.html
    public function base(Request $request)
    {
        if (!$this->token && !$this->user_token) {
            return redirect('/login');
        }
        $this->user = $this->user_token;
        return view('home.index', $this->data);
    }
}
