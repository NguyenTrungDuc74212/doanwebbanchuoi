<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseOrder extends Model
{
    use HasFactory;
    protected $table = "tbl_warehouse_order";
    public function warehouse_product()
    {
    	return $this->hasMany(WarehouseProduct::class,'warehouse_product_id','id');
    }
    public function order_detail()
    {
    	return $this->hasMany(Order_detail::class,'order_detail_id','id');
    }
}
