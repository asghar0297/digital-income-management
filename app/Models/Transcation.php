<?php

namespace App\Models;
use Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transcation extends Model
{
    use HasFactory;
    protected $fillable = ['date','category_id','amount','account_id','type','description','user_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    // public function setUserIdAttribute($value)
    // {
    //     $this->attributes['user_id'] = Auth::id();
    // }

    // public function setAmountAttribute($value)
    // {
    //     // dd($this->category->type);

    //     if($this->category->type == 'expense')
    //     {
    //         $this->attributes['amount'] = -1 * $value;
    //         $this->attributes['type'] = 'expense';

    //         // Deduct from account balance
    //         $this->account->decrement('current_balance', $value);

    //     }elseif($this->category->type == 'income'){

    //         $this->attributes['amount'] = $value;
    //         $this->attributes['type'] = 'income';

    //         // dd( $this);
    //         // // Add to account balance
    //         // $this->account->increment('current_balance', $value);
            
    //     }else{
    //         $this->attributes['type'] = 'transfer';

    //     }

    //     $this->account->current_balance = $value;
    // }

    public function getPrettyCategoryAttribute(){
        $category = $this->category;
        // dd($this->category->parent_category);
        if($category->parent_category)
        {
            $category = $category->category .' ('.$category->parent_category->category.')';
        }else{
            $category = $category->category ;
        }
        return $category;
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public static function setAmount(&$data,$credit = false){
        $category = Category::whereId( $data['category_id'] )->first();
        $account = Account::whereId( $data['account_id'] )->first();

        if(isset($category->type) && $category->type == 'expense')
        {
            $account->decrement('current_balance', $data['amount']);
            $data['amount'] = -1 * $data['amount'];
            $data['type'] = 'expense';

        }elseif(isset($category->type) && $category->type == 'income'){
            $account->increment('current_balance', $data['amount']);
            $data['amount'] = $data['amount'];
            $data['type'] = 'income';
        }else{
            $data['type'] = 'transfer';
            $data['amount'] = $credit ? -1 *$data['amount'] : $data['amount'];

        }
    }
}
