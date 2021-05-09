<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "tbl_post";
    public function category_post()
    {
    	return $this->belongsTo(CategoryPost::class,'category_id','id');
    }
}
