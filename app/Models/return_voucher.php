<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class return_voucher extends Model
{
    use HasFactory;
    protected $table="tbl_return_voucher";

    public function return_detail(){
        return $this->hasMany(return_voucher_detail::class,'voucher_id','id');
    }
}
