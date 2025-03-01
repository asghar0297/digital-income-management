<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Auth;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id','parent_category_id','category','type','status','user_id','deleted_at','created_at','updated_at'];

    public function parent_category(){
        return $this->belongsTo(Category::class,'parent_category_id','id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }
    // public function setUserIdAttribute($value)
    // {
    //     $this->attributes['user_id'] = Auth::id();
    // }

}
