<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('/checkout')->with([
            "globalData" => collect([
                'user' => Auth::user()
            ])
        ]);
    }
}
