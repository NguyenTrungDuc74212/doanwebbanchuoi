<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class return_voucher_detail extends Model
{
    use HasFactory;
     protected $table="tbl_return_voucher_detail";

     public function warehouse_product()
     {
     	return $this->belongsTo(warehouseProduct::class,'return_warehouse_id','id');
     }
}
