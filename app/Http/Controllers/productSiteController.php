<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productSiteController extends Controller
{
    //
    public function getProductDetail($id)
    {
        $product=Product::find($id);
        return view("website.product_details",compact('product'));
    }
}
