@extends('layouts.main')
@section('content')
    <div class="page-header">
        <h4 class="page-title">Manage {{$title}}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                    </div>
                        <a href="{{ route('expense-management.transaction.create') }}" class="btn btn-primary" >Add {{$title}}</a>
                </div>
                <div class="card-body">
                    @include('partials.flash_message')
                    <form action="{{ route('expense-management.category.index') }}">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Start Date</label>
                                    {!! Form::date('start_date',request()->start_date,['class'=>'form-control', 'required' => 'true']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">End Date</label>
                                    {!! Form::date('end_date',request()->end_date,['class'=>'form-control', 'required' => 'true']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-info mt-5">Filter</button>
                            </div>
                        </div>
                     </form>
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered key-buttons text-nowrap border-top0">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-15p">Date</th>
                                    <th class="wd-15p">Category</th>
                                    <th class="wd-15p">Account</th>
                                    <th class="wd-15p">Amount</th>
                                    <th class="wd-15p">Type</th>
                                    <th class="wd-15p">Created At</th>
                                    <th class="wd-25p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $key => $model )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ \Carbon\Carbon::parse($model->date)->format('F j, Y') }}</td>
                                        <td>{{ $model->pretty_category ?? '-' }}</td>
                                        <td>{{ $model->account->name ?? '-' }}</td>
                                        <td>{{ $model->amount ?? '-' }}</td>
                                        <td>{{ $model->category->type ?? 'Transfer' }}</td>
                                        <td>{{ $model->created_at->format('j F, Y, g:i a') }}</td>
                                        <td class="text-center align-middle">
                                            <div class="btn-group align-top">
                                                
                                                <a href="{{ route('expense-management.transaction.edit',$model->id) }}" class="btn btn-sm btn-primary badge m-1"><i class="fa fa-pencil"></i></a>
                                                {{ Form::open(['route' => ['expense-management.transaction.destroy',$model->id] ]) }}
                                                    @method('delete')
                                                    <button type="submit"  class="btn btn-sm btn-danger badge m-1"><i class="fa fa-trash"></i></button>
                                                {{ Form::close() }}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
