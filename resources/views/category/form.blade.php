@extends('layouts.main')
@section('content')

<div class="page-header">
    <h4 class="page-title">Category</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $title }} </li>
    </ol>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 card-title">{{ $title }} </h3>
            </div>
            
            <div class="card-body">
                @include('partials.flash_message')
                @if(isset($model->id))
                    {{ Form::open(['route' => ['expense-management.category.update',$model->id] ]) }}
                    @method('put')
                @else
                    {{ Form::open(['route' => 'expense-management.category.store']) }}
                    @method('post')
                @endif
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group m-0">
                                <label class="form-label">Parent Category</label>
                                {!! Form::select(
                                            'parent_category_id',
                                            $parent_categories,
                                            $model->parent_category_id,
                                            [
                                                'class'=>'form-control select2 custom-select ' . ($errors->has('parent_category_id') ? 'is-invalid' : ''),
                                                'placeholder'=>'Select Parent Category'
                                            ]
                                        )
                                !!}
                               
                                
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group m-0">
                                <label class="form-label">Category</label>
                                {!! Form::text('category',$model->category,['class'=>'form-control ' . ($errors->has('category') ? 'is-invalid' : ''),'placeholder'=>'Utility Bills']) !!}

                                @if ($errors->has('category'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('category') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <label class="form-label">Category Type</label>
                                {!! Form::select(
                                            'type',
                                            $types,
                                            $model->type,
                                            [
                                                'class'=>'form-control select2 custom-select ' . ($errors->has('type') ? 'is-invalid' : ''),
                                                'placeholder'=>'Select Category Type'
                                            ]
                                        )
                                !!}
                                @if ($errors->has('type'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('type') }}
                                    </div>
                                @endif
                                
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group mt-6">
                                <div class="form-label">Active/Inactive</div>
                                <label class="custom-switch">
                                    <input type="checkbox" name="status" class="custom-switch-input" {{ $model->status ? 'checked' : 'cc' }}>
                                    <span class="custom-switch-indicator"></span>
                                    {{-- <span class="custom-switch-description">I agree with terms and conditions</span> --}}
                                </label>
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
