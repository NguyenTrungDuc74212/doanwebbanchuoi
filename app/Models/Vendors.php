<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    use HasFactory;
    protected $table = "tbl_vendors";
    public function inputSheet()
    {
    	return $this->hasMany(InputSheet::class,'vendor_id','id');
    }
    public function product()
    {
    	return $this->hasMany(Product::class,'vendor_id','id');
    }
}
