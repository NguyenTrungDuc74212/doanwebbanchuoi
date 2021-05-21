<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
	use HasFactory;
	protected $table = "tbl_category_post";
    public function post()
    {
    	return $this->hasMany(Post::class,'category_id','id');
    }
}
