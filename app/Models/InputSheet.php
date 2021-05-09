<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputSheet extends Model
{
    use HasFactory;
    protected $table = "Tbl_inward_slip";
    public function vendor()
    {
    	return $this->belongsTo(Vendors::class,'vendor_id','id');
    }
      public function user()
    {
    	return $this->belongsTo(User::class,'user_id','id');
    }
      public function warehouse()
    {
    	return $this->belongsTo(Warehouse::class,'warehouse_id','id');
    }
     public function input_detail()
    {
        return $this->hasMany(InputSheetDetail::class,'inward_slip_id','id');
    }
}
