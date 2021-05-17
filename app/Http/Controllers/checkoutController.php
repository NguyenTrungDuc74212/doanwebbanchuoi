<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Tinhthanhpho;

class checkoutController extends Controller
{
    public function get_checkout()
    {
    	$city = Tinhthanhpho::orderby('matp','DESC')->get();
		return view("website.checkout.checkout",compact('city'));
    }
}
