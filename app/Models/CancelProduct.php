<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelProduct extends Model
{
    use HasFactory;
    protected $table = "tbl_cancel_product";
    public function warehouse_product()
    {
    	return $this->belongsTo(WarehouseProduct::class,'warehouse_product_id','id');
    }
}
