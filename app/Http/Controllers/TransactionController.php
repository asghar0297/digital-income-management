<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transcation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    protected $accounts;
    public function __construct(){
        $this->accounts = Account::where('status',1)->pluck('name','id');
    }

    public function index()
    {
        $models = Transcation::with([
            'category:id,category,type,parent_category_id', 
            'category.parent_category:id,category'
        ])->orderBy('created_at','desc')->get();
        $title = 'Transcation';
        return view('transaction.index', compact('title','models'));
    }

    public function rules()
    {
        return [
            'category_id' => 'required',
            'account_id' => 'required',
            'amount' => 'required',
        ];
    }

    function create(){
        $model = new Transcation();
        $model->date = date('Y-m-d');
        $parent_categories = Category::whereNull('parent_category_id')->pluck('category','id');
        $categories = Category::whereNotNull('parent_category_id')->pluck('category','id');

        $accounts = $this->accounts;
        return view('transaction.form', compact('model', 'parent_categories','categories', 'accounts'));
    }

    public function store(Request $request)
    {
       
        $this->validate($request, $this->rules());

        $data = $request->all();
        $data['user_id'] = 1;

        Transcation::setAmount($data);

        // dd($data);

       

        $category = Transcation::create($data);
        Session::flash('success','Transcation Added Successfully');
        return redirect()->route('expense-management.transaction.create');
    }

    
}
