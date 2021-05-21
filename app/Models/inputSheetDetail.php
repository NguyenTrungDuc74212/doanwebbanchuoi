<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inputSheetDetail extends Model
{
    use HasFactory;
    protected $table = "tbl_inward_slip_details";
    public function product()
    {
    	return $this->belongsTo(Product::class,'product_id','id');
    }
    public function input()
    {
    	return $this->belongsTo(InputSheet::class,'inward_slip_id','id');
    }
    
}
