@extends('layouts.main')
@section('content')

<div class="page-header">
    <h4 class="page-title">Account</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Account</a></li>
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
                    {{ Form::open(['route' => ['expense-management.accounts.update',$model->id] ]) }}
                    @method('put')
                @else
                    {{ Form::open(['route' => 'expense-management.accounts.store']) }}
                    @method('post')
                @endif
                    <div class="row">
                        
                        
                        
                        <div class="col-md-6">
                            <div class="form-group m-0">
                                <label class="form-label">Account Name</label>
                                {!! Form::text('name',$model->name,['class'=>'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),'placeholder'=>'United Bank Limited']) !!}

                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label">Account Type</label>
                                {!! Form::select(
                                            'account_type',
                                            $types,
                                            $model->account_type,
                                            [
                                                'class'=>'form-control select2 custom-select ' . ($errors->has('account_type') ? 'is-invalid' : ''),
                                                'placeholder'=>'Select Account Type'
                                            ]
                                        )
                                !!}
                                @if ($errors->has('type'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('account_type') }}
                                    </div>
                                @endif
                                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label">Initial Balance</label>
                                {!! Form::number(
                                            'initial_balance',
                                            $model->initial_balance,
                                            [
                                                'class'=>'form-control ' . ($errors->has('initial_balance') ? 'is-invalid' : ''),
                                                'placeholder'=>'10000',
                                              //  'required'=>'required',
                                            ]
                                        )
                                !!}
                                @if ($errors->has('initial_balance'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('initial_balance') }}
                                    </div>
                                @endif
                                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-label">Current Balance</label>
                                {!! Form::number(
                                            'current_balance',
                                            $model->current_balance,
                                            [
                                                'class'=>'form-control ' . ($errors->has('current_balance') ? 'is-invalid' : ''),
                                                'placeholder'=>'10000',
                                                // 'required'=>'required',
                                            ]
                                        )
                                !!}
                                @if ($errors->has('current_balance'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('current_balance') }}
                                    </div>
                                @endif
                                
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="form-label">Description</label>
                                {!! Form::textarea(
                                            'description',
                                            $model->description,
                                            [
                                                'class'=>'form-control' . ($errors->has('description') ? 'is-invalid' : ''),
                                                'placeholder'=>'Main Account'
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


                        <div class="col-md-6">
                            <div class="form-group ">
                                <div class="form-label">Active/Inactive</div>
                                <label class="custom-switch">
                                    <input type="checkbox" name="status" class="custom-switch-input" {{ $model->status ? 'checked' : '' }}>
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
