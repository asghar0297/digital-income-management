<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transfer;
use App\Models\Transcation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TransferController extends Controller
{
    protected $accounts;

    public function __construct()
    {
        $this->accounts = Account::where('status', 1)->pluck('name', 'id');
    }

    public function index()
    {
        $models = Transfer::with(['fromAccount', 'toAccount', 'user'])->orderBy('created_at', 'desc')->get();
        $title = 'Transfers';
        return view('transfer.index', compact('title', 'models'));
    }

    public function create()
    {
        $model = new Transfer();
        $accounts = $this->accounts;
        return view('transfer.form', compact('model', 'accounts'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'from_account_id' => 'required|exists:accounts,id',
            'to_account_id' => 'required|exists:accounts,id|different:from_account_id',
            'amount' => 'required|numeric|min:0.01',
            'transfer_date' => 'required|date',
        ];

        $this->validate($request, $rules);


        $data = $request->all();
        $data['user_id'] = 1;

        // Process Account Balance Updates
        Transfer::processTransfer($data);

        // Create a Transfer Entry
        $transfer = Transfer::create($data);

        $transaction_data = [
            'date' => $data['transfer_date'],
            'category_id' => null, // Since it's a transfer
            'user_id' => $data['user_id'],
            'account_id' => $data['from_account_id'],
            'amount' => $data['amount'],
            'description' => 'Transfer to ' . $transfer->toAccount->name,
        ];

        // Insert Debit Transaction (from_account)
        Transcation::setAmount($transaction_data,true);
        Transcation::create($transaction_data);

        $transaction_data = [
            'date' => $data['transfer_date'],
            'category_id' => null, // Since it's a transfer
            'user_id' => $data['user_id'],
            'account_id' => $data['to_account_id'],
            'amount' => $data['amount'],
            'description' => 'Transfer from ' . $transfer->fromAccount->name,
        ];
        
        // Insert Credit Transaction (to_account)
        Transcation::setAmount($transaction_data);
        Transcation::create($transaction_data);

        Session::flash('success', 'Transfer Added Successfully');
        return redirect()->route('expense-management.transfer.index');
    }
}
