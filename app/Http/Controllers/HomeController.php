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


    // 02_base.html
    public function index(Request $request)
    {
        if (!$this->token) {
            return redirect('/login');
        }
        return view('home.index', $this->data);
    }
}
