<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;

class productSiteController extends Controller
{
    //
    public function getProductDetail($slug)
    {
        $product=Product::where('slug',$slug)->first();
        $product_related = Product::where('category_product_id',$product->category_product_id)->limit(4)->get();
        return view("website.product_details",compact('product','product_related'));
    }
}
