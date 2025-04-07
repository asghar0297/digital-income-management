<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'from_account_id',
        'to_account_id',
        'amount',
        'transfer_date',
        'description',
        'tax',
    ];

    public function fromAccount()
    {
        return $this->belongsTo(Account::class, 'from_account_id');
    }

    public function toAccount()
    {
        return $this->belongsTo(Account::class, 'to_account_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function processTransfer(&$data)
    {
        $fromAccount = Account::find($data['from_account_id']);
        $toAccount = Account::find($data['to_account_id']);

        if ($fromAccount && $toAccount) {
            $fromAccount->decrement('current_balance', $data['amount']);
            $toAccount->increment('current_balance', $data['amount']);
        }
    }
}
