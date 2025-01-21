<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TermController extends Controller
{
    public function __construct()
    {
    }


    // terms.html
    public function index(Request $request)
    {
        return view('term.index', $this->data);
    }
}
