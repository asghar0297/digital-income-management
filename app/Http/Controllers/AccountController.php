<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    protected $account_type = ['cash' => 'Cash', 'bank' => 'Bank', 'credit_card' => 'Credit Card', 'digital_wallet' => 'Digital Wallet', 'investment' => 'Investment','saving' => 'Saving', 'other' => 'Other'];
    public function __construct(){

    }
   
    public function index()
    {
        $models = Account::orderBy('created_at','desc')->get();
        $title = 'Accounts';
        return view('accounts.index', compact('title','models'));
    }

    
    public function rules()
    {
        return [
            'name' => 'required',
            'account_type' => 'required',
            'initial_balance' => 'required|string',
            'description' => 'nullable|string|max:100',
         ];
    }

    function create(){
        $model = new Account();
        $title = 'Add Account';
        $types = $this->account_type;
        return view('accounts.form', compact('model' , 'types','title'));
    }
    

    public function store(Request $request)
    {
        // dd($request->all());
        $validatar = Validator::make($request->all(),$this->rules());

        $this->validate($request, $this->rules());

        $data = $request->all();
        $data['user_id'] = 1;
        $data['status'] = $request->has('status') ? 1 : 0;
        // dd($data);
        $account = Account::create($data);
        Session::flash('success','Account Added Successfully');
        return redirect()->route('expense-management.accounts.create');
    }


    public function show(Account $account)
    {
        return $this->success($account,'Account fetch Successfully');
    }


    function edit($id){
        $model = Account::find($id);
        $title = 'Edit Account';
        $types = $this->account_type;
        return view('accounts.form', compact('model' , 'types','title'));
    }

    function update(Request $request, Account $account){
       $this->validate($request, $this->rules());

        $data = $request->all();
        $data['user_id'] = 1;
        $data['status'] = $request->has('status') ? 1 : 0;
        $account = $account->update($data);
        Session::flash('success','Account Updated Successfully');
        return redirect()->route('expense-management.accounts.index');
    }


    public function destroy(Account $account)
    {
        $account->delete();
        Session::flash('success','Account Remove Successfully');
        return redirect()->route('expense-management.accounts.index');
    }
}
