<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = "tbl_category_product";
    public function product()
    {
    	return $this->hasMany(Product::class,'category_product_id','id');
    }
}
