@extends('layouts.main')
@section('content')

<div class="page-header">
    <h4 class="page-title">Prayer Management</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Prayer Management</a></li>
        <li class="breadcrumb-item active" aria-current="page">Mark Prayer</li>
    </ol>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 card-title">Mark Prayer</h3>
            </div>
            @include('partials.flash_message')
            <div class="card-body">
                
                @if(isset($model->id))
                    {{ Form::open(['route' => ['prayer-management.update',$model->id] ]) }}
                    @method('put')
                @else
                    {{ Form::open(['route' => 'prayer-management.store']) }}
                    @method('post')
                @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="wd-200 mg-b-30">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        {!! Form::text('date',$model->date,['class'=>'form-control fc-datepicker','placeholder'=>'MM/DD/YYYY','autocomplete'=>'off']) !!}

                                    </div>
                                </div>
                            </div>
                            
                        
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                {!! Form::select('prayer_status',$prayer_status,$model->prayer_status,['class'=>'form-control select2 custom-select','placeholder'=>'Select Prayer Status']) !!}

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                {!! Form::select('prayer',$prayers,$model->prayer,['class'=>'form-control select2 custom-select','placeholder'=>'Select Prayer']) !!}

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