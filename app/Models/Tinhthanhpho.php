<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tinhthanhpho extends Model
{
    use HasFactory;
    protected $table="tbl_tinhthanhpho";
     public function Tbl_quanhuyen()
    {
    	return $this->hasMany(Quanhuyen::class,'matp_id','matp');
    }
}
