<?php

namespace App\Models;
use Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transcation extends Model
{
    use HasFactory;
    protected $fillable = ['date','category_id','amount','description','user_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    // public function setUserIdAttribute($value)
    // {
    //     $this->attributes['user_id'] = Auth::id();
    // }

    public function setAmountAttribute($value)
    {
        // dd($this->category->type);

        if($this->category->type == 'expense')
        {
            $this->attributes['amount'] = -1 * $value;
        }else{
            $this->attributes['amount'] = $value;

        }
    }

    public function getPrettyCategoryAttribute(){
        $category = $this->category;
        // dd($this->category->parent_category);
        if($category->parent_category)
        {
            $category = $category->category .' ('.$category->parent_category->category.')';
        }
        return $category;
    }
}
