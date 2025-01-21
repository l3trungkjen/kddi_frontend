<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __construct()
    {
    }


    // 02_base.html
    public function index(Request $request)
    {
        return view('home.index', $this->data);
    }
}
