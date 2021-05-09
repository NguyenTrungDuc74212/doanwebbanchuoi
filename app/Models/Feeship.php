<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
	use HasFactory;
	protected $table = "tbl_feeship";
	public function Tbl_tinhthanhpho()
	{
		return $this->belongsTo(Tinhthanhpho::class,"matp_id","matp");
	}
	public function Tbl_quanhuyen()
	{
		return $this->belongsTo(Quanhuyen::class,"maqh_id","maqh");
	}
	public function Tbl_xaphuongthitran()
	{
		return $this->belongsTo(Xaphuongthitran::class,"xa_id","xaid");
	}
}
