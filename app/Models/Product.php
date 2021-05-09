<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "tbl_product";
    public function category_product()
    {
    	return $this->belongsTo(CategoryProduct::class,'category_product_id','id');
    }
    public function vendor()
    {
    	return $this->belongsTo(Vendors::class,'vendor_id','id');
    }
}
