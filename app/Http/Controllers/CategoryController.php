<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
   
    public function index()
    {
        $models = Category::orderBy('created_at','desc')->get();
        $title = 'Category';
        return view('category.index', compact('title','models'));
    }
    public function getChildCategories(Request $request)
    {

        $models = Category::where('parent_category_id',$request->category_id)->where('status',1)->orderBy('created_at','desc')->get(['id','category']);
        $flag = 'category';
        $options = view('partials.options',compact('models','flag'))->render();
        return response()->json([
            'status' => true,
            'message' => 'Categories fetched successfully',
            'data' => $options,
            'data_count' => count($models)
        ]);
        
    }


    public function rules()
    {
        return [
            'category' => 'required',
            'type' => 'required|string|max:10'
        ];
    }

    function create(){
        $model = new Category();
        $title = 'Add Category';
        $parent_categories = Category::whereNull('parent_category_id')->pluck('category','id');
        $categories = Category::whereNotNull('parent_category_id')->pluck('category','id');
        $types = ['income' => 'Income', 'expense' =>'Expense'];
        return view('category.form', compact('model', 'parent_categories','categories', 'types','title'));
    }
    

    public function store(Request $request)
    {
        // dd($request->all());
        $validatar = Validator::make($request->all(),$this->rules());

        $this->validate($request, $this->rules());

        $data = $request->all();
        $data['user_id'] = 0;
        $data['status'] = $request->has('status') ? 1 : 0;
        // dd($data);
        $category = Category::create($data);
        Session::flash('success','Category Added Successfully');
        return redirect()->route('expense-management.category.create');
    }


    public function show(Category $category)
    {
        return $this->success($category,'Category fetch Successfully');
    }


    function edit($id){
        $model = Category::find($id);
        $title = 'Edit Category';
        $parent_categories = Category::whereNull('parent_category_id')->pluck('category','id');
        $types = ['income' => 'Income', 'expense' =>'Expense'];
        return view('category.form', compact('model', 'parent_categories', 'types','title'));
    }

    function update(Request $request, Category $category){
        
       $this->validate($request, $this->rules());

        $data = $request->all();
        $data['user_id'] = 0;
        $data['status'] = $request->has('status') ? 1 : 0;
        $category = $category->update($data);
        Session::flash('success','Category Updated Successfully');
        return redirect()->route('expense-management.category.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('success','Category Remove Successfully');
        return redirect()->route('expense-management.category.index');
    }
}
