<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseProduct extends Model
{
    use HasFactory;
    protected $table = "tbl_warehouse_product";
    public function warehouse_order()
    {
        return $this->hasMany(WarehouseOrder::class,'warehouse_product_id','id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class,'warehouse_id','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function cancel_product()
    {
    	return $this->hasMany(CancelProduct::class,'warehouse_product_id','id');
    }
}
