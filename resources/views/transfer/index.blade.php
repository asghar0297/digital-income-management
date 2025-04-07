@extends('layouts.main')

@section('content')
<div class="page-header">
    <h4 class="page-title">Manage Transfers</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active" aria-current="page">Transfers</li>
    </ol>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('expense-management.transfer.create') }}" class="btn btn-primary">Add Transfer</a>
            </div>
            <div class="card-body">
                @include('partials.flash_message')

                <div class="table-responsive">
                    <table id="example" class="table table-bordered key-buttons text-nowrap border-top0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Transfer Date</th>
                                <th>From Account</th>
                                <th>To Account</th>
                                <th>Amount</th>
                                <th>Tax</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($models as $key => $model)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($model->transfer_date)->format('F j, Y') }}</td>
                                    <td>{{ $model->fromAccount->name ?? '-' }}</td>
                                    <td>{{ $model->toAccount->name ?? '-' }}</td>
                                    <td>{{ number_format($model->amount, 2) }}</td>
                                    <td>{{ number_format($model->tax, 2) }}</td>
                                    <td>{{ $model->created_at->format('j F, Y, g:i a') }}</td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group">
                                            <a href="{{ route('expense-management.transfer.edit', $model->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            {{ Form::open(['route' => ['expense-management.transfer.destroy', $model->id], 'method' => 'delete']) }}
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            {{ Form::close() }}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="8" class="text-center">No transfers found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
