@extends('layouts.main')

@section('content')

<div class="page-header">
    <h4 class="page-title">Transfer</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Transfer</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Transfer</li>
    </ol>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 card-title">Add Transfer</h3>
            </div>

            <div class="card-body">
                @include('partials.flash_message')

                @if(isset($model->id))
                    {{ Form::open(['route' => ['expense-management.transfer.update', $model->id], 'method' => 'put']) }}
                @else
                    {{ Form::open(['route' => 'expense-management.transfer.store', 'method' => 'post']) }}
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Transfer Date</label>
                            {!! Form::text('transfer_date', $model->transfer_date, ['class' => 'form-control fc-datepicker '. ($errors->has('transfer_date') ? 'is-invalid' : ''),'placeholder'=>'MM/DD/YYYY','autocomplete'=>'off']) !!}
                            @if ($errors->has('transfer_date'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('transfer_date') }}
                                    </div>
                                @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">From Account</label>
                            {!! Form::select(
                                'from_account_id',
                                $accounts,
                                $model->from_account_id,
                                [
                                    'class' => 'form-control select2 custom-select '. ($errors->has('from_account_id') ? 'is-invalid' : ''),
                                    'placeholder' => 'Select Account',
                                    // 'required' => 'required',
                                ]
                            ) !!}
                            @if ($errors->has('from_account_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('from_account_id') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">To Account</label>
                            {!! Form::select(
                                'to_account_id',
                                $accounts,
                                $model->to_account_id,
                                [
                                    'class' => 'form-control select2 custom-select '. ($errors->has('transfer_date') ? 'is-invalid' : ''),
                                    'placeholder' => 'Select Account',
                                    // 'required' => 'required',
                                ]
                            ) !!}
                            @if ($errors->has('to_account_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('to_account_id') }}
                            </div>
                        @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Amount</label>
                            {!! Form::number(
                                'amount',
                                $model->amount,
                                [
                                    'class' => 'form-control ' . ($errors->has('amount') ? 'is-invalid' : ''),
                                    'placeholder' => '10000',
                                    // 'required' => 'required',
                                    'step' => '0.01',
                                ]
                            ) !!}
                            @if ($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Tax</label>
                            {!! Form::number(
                                'tax',
                                $model->tax ?? 0.00,
                                [
                                    'class' => 'form-control',
                                    'placeholder' => 'Tax Amount',
                                    'step' => '0.01',
                                ]
                            ) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            {!! Form::textarea(
                                'description',
                                $model->description,
                                [
                                    'class' => 'form-control',
                                    'placeholder' => 'Transfer Details',
                                    'rows' => 3,
                                ]
                            ) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Save Transfer</button>
                    </div>

                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
