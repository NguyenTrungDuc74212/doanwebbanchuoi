<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soical extends Model
{
    use HasFactory;
    protected $table ="tbl_soical";
	public $timestamps = false;
	protected $fillable = [
		'provider_user_id',  'provider',  'user','provider_user_email'
	];
	public function customer()
	{
		return $this->belongsTo(Customer::class,'user','id');
	}
}
