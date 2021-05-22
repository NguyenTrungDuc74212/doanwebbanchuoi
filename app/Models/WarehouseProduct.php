<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseProduct extends Model
{
    use HasFactory;
    protected $table = "tbl_warehouse_product";
<<<<<<< HEAD
    public function warehouse_order()
    {
        return $this->hasMany(WarehouseOrder::class,'warehouse_product_id','id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class,'warehouse_id','id');
    }
=======
>>>>>>> c540d5bb6168e8ab5d1d711e9f433b0d4b02b399
}
