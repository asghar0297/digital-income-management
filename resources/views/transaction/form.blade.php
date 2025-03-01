@extends('layouts.main')
@section('content')

<div class="page-header">
    <h4 class="page-title">Transaction</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Transaction</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Transaction</li>
    </ol>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 card-title">Add Transaction</h3>
            </div>
            
            <div class="card-body">
                @include('partials.flash_message')
                @if(isset($model->id))
                    {{ Form::open(['route' => ['expense-management.transaction.update',$model->id] ]) }}
                    @method('put')
                @else
                    {{ Form::open(['route' => 'expense-management.transaction.store']) }}
                    @method('post')
                @endif
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group m-0">
                                <label class="form-label">Date</label>
                                {!! Form::text('date',$model->date,['class'=>'form-control fc-datepicker','placeholder'=>'MM/DD/YYYY','autocomplete'=>'off']) !!}
                               
                                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-0">
                                <label class="form-label">Prent Category</label>
                                {!! Form::select(
                                            'parent_category_id',
                                            $parent_categories,
                                            $model->parent_category_id,
                                            [
                                                'id' => 'parent_category',
                                                'class'=>'form-control select2 custom-select ' . ($errors->has('parent_category_id') ? 'is-invalid' : ''),
                                                'placeholder'=>'Select Parent Category',
                                                'onchange' => 'getChildCategory($(this))', 
                                            ]
                                        )
                                !!}

                            </div>
                        </div>
                        
                        <div class="col-md-6" id="category_div" style="display: none">
                            <div class="form-group mt-4">
                                <label class="form-label">Category</label>
                                {!! Form::select(
                                            'category_id',
                                            $categories,
                                            $model->parent_category_id,
                                            [
                                                'id' => 'category_id',
                                                'class'=>'form-control select2 custom-select ' . ($errors->has('category_id') ? 'is-invalid' : ''),
                                                'placeholder'=>'Select Category',
                                                'required'=>'required',
                                            ]
                                        )
                                !!}
                               
                                
                            </div>
                        </div>
                        

                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <label class="form-label">Account</label>
                                {!! Form::select(
                                            'account_id',
                                            $accounts,
                                            $model->account_id,
                                            [
                                                'class'=>'form-control select2 custom-select ' . ($errors->has('account_id') ? 'is-invalid' : ''),
                                                'placeholder'=>'Select Account',
                                                'required'=>'required',
                                            ]
                                        )
                                !!}
                                @if ($errors->has('account_id'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('account_id') }}
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <label class="form-label">Amount</label>
                                {!! Form::number(
                                            'amount',
                                            $model->amount,
                                            [
                                                'class'=>'form-control ' . ($errors->has('amount') ? 'is-invalid' : ''),
                                                'placeholder'=>'10000',
                                                'required'=>'required',
                                            ]
                                        )
                                !!}
                                @if ($errors->has('amount'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('amount') }}
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <label class="form-label">Description</label>
                                {!! Form::textarea(
                                            'description',
                                            $model->description,
                                            [
                                                'class'=>'form-control' . ($errors->has('description') ? 'is-invalid' : ''),
                                                'placeholder'=>'Monthly School Fee'
                                            ]
                                        )
                                !!}
                                @if ($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                                
                            </div>
                        </div>


                        
                            
                        
                        
                        <div class="col-md-12">
                            <button class="btn btn-pill btn-primary" type=" submit">Save</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
       
    </div>

    
</div>
@endsection

<script>
    function getChildCategory(element){
        const selectedValue = element.val(); 
        const category = $('#category_id');
        const categoryBox = $('#category_div');
        console.log(selectedValue);
        
        $.ajax({
            url: '{{ route('expense-management.getChildCategories') }}',
            type: 'GET',
            data:{category_id:selectedValue},
            success:function(res){
                if(res.status){
                    // if child category is available show child category
                    if(res.data_count > 0){
                        element.attr('name', 'parent_category_id');
                        category.html(res.data);
                        categoryBox.show();
                    }else{
                        // if child category is not available hide child category and make parent category as child category
                        categoryBox.hide();
                        element.attr('name', 'category_id');
                    }
                }
                
            }
        })
    }
</script>
