<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addressController extends Controller
{
    public function getViewAddress()
    {
        return view('website.address_store');
    }
}
