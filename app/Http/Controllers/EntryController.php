<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EntryController extends Controller
{
    public function __construct()
    {
    }


    // 05_flow-entry.html
    public function flow(Request $request)
    {
        return view('entry.flow', $this->data);
    }

    // 06_entry.html
    public function stepOne(Request $request)
    {
        return view('entry.step_one', $this->data);
    }

    // 06_entry-step2.html
    public function stepTwo(Request $request)
    {
        return view('entry.step_two', $this->data);
    }

    // 06_entry-step3.html
    public function stepThree(Request $request)
    {
        return view('entry.step_three', $this->data);
    }
}
