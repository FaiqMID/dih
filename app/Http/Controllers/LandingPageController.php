<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        // phpinfo();
        // $notifs = Notification::all();
        $products = Product::all()->take(6);
        // dd($products);
        return view('landing_page', ['products' => $products]);
    }

    public function paymentFail(Request $request){
        return view('landing_page', ['request' => $request]);
    }
}
