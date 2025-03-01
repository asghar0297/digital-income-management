@extends('layouts.main')

<style>
    .counter-container {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        height: 100%;
    }
    
    .counter-container h1 {
        margin: 0;
        color: #343a40;
    }
    
    .counter-container h6 {
        margin-bottom: 5px;
    }
    
    .counter-balance {
        background-color: #e9f7ef;
    }
    
    .counter-balance h1 {
        color: #27ae60;
    }
</style>
<!-- Dygraph css -->
<link href="{{ url('assets/plugins/dygraph-charts/dygraph.css') }}" rel="stylesheet">
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
                </div>
                <div class="card-body">
                    @include('partials.flash_message')
                    {{-- <form action="{{ route('expense-management.category.index') }}">
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
                     </form> --}}
                     <div class="row text-center">
                        <div class="col-md-3">
                            <button type="button" class="btn btn-success btn-lg mb-1 w-100">Daily</button>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary btn-lg mb-1 w-100">Weekly</button>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-warning btn-lg mb-1 w-100">Monthly</button>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-danger btn-lg mb-1 w-100">Yearly</button>
                        </div>
                    </div>

                    <!-- Counters Row -->
                    <div class="row mt-4">
                        <!-- Expense Counter -->
                        <div class="col-md-6 text-center mb-3 mb-md-0">
                            <div class="counter-container">
                                <h6 class="text-muted">TOTAL EXPENSES</h6>
                                <h1 class="display-4 font-weight-bold">RS 1,819,819</h1>
                            </div>
                        </div>
                        
                        <!-- Balance Counter -->
                        <div class="col-md-6 text-center">
                            <div class="counter-container counter-balance">
                                <h6 class="text-muted">CURRENT BALANCE</h6>
                                <h1 class="display-4 font-weight-bold">RS 2,456,789</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Bar Chart</h3>
                                </div>
                                <div class="card-body text-center">
                                    <div id="highchart7"></div>
                                    <button id="plain" class="btn btn-outline-primary btn-sm">Plain</button>
                                    <button id="inverted" class="btn btn-outline-primary btn-sm">Inverted</button>
                                    <button id="polar" class="btn btn-outline-primary btn-sm">Polar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Model 4 </h3>
                                </div>
                                <div class="card-body">
                                    <div id="barlinechart" class="chartsh"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('scripts')
        <!-- Charts js-->
		<script src="{{ url('assets/plugins/highcharts/highcharts.js') }}"></script>
		<script src="{{ url('assets/plugins/highcharts/highcharts-3d.js') }}"></script>
		<script src="{{ url('assets/plugins/highcharts/exporting.js') }}"></script>
		<script src="{{ url('assets/plugins/highcharts/export-data.js') }}"></script>
		<script src="{{ url('assets/plugins/highcharts/histogram-bellcurve.js') }}"></script>
		<script src="{{ url('assets/plugins/highcharts/solid-gauge.js') }}"></script>

        <!--Chart js-->
		<script src="{{ url('assets/js/highcharts.js') }}"></script>
        <!--Dygraph Charts js-->
		<script src="{{ url('assets/plugins/dygraph-charts/dygraph.js') }}"></script>
		<script src="{{ url('assets/plugins/dygraph-charts/data.js') }}"></script>
         <!-- Chart js-->
		<script src="{{ url('assets/js/chart-dygraph.js') }}"></script>
@endsection
