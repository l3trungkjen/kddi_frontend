<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PurchaseController extends Controller
{
    public function __construct()
    {
    }


    // 07_pricelist.html
    public function priceList(Request $request)
    {
        return view('purchase.price_list', $this->data);
    }

    // 08_flow-purchase.html
    public function flow(Request $request)
    {
        return view('purchase.flow', $this->data);
    }

    // 09_purchase.html
    public function stepOne(Request $request)
    {
        return view('purchase.step_one', $this->data);
    }

    // 09_purchase-step2.html
    public function stepTwo(Request $request)
    {
        return view('purchase.step_two', $this->data);
    }

    // 09_purchase-step3.html
    public function stepThree(Request $request)
    {
        return view('purchase.step_three', $this->data);
    }
}
