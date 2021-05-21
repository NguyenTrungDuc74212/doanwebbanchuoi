<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quanhuyen extends Model
{
    use HasFactory;
    protected $table = "tbl_quanhuyen";
    public function Tbl_xaphuongthitran()
    {
    	return $this->hasMany(Xaphuongthitran::class,'maqh_id','maqh');
    }
}
