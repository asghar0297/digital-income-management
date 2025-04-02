<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id','name','account_type','initial_balance','current_balance','description','is_active','deleted_at','created_at','updated_at'];

}
