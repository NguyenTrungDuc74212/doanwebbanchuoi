<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table="roles";
    public function user()
    {
         return $this->belongsToMany(User::class,'users_roles','role_id','user_id');
    }
}
