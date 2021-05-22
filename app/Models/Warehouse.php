<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'tbl_warehouse';
    public function product(){
    	return $this->belongsToMany(Product::class,'tbl_warehouse_product','warehouse_id','product_id');
    }
    public function warehouseProduct(){
    	return $this->hasMany(WarehouseProduct::class,'warehouse_id','id');
    }
}
