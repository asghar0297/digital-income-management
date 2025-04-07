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
                            <button type="button" class="btn btn-success btn-lg mb-1 w-100" onclick="getDashboard('daily')" >Daily</button>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary btn-lg mb-1 w-100" onclick="getDashboard('weekly')" >Weekly</button>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-warning btn-lg mb-1 w-100" onclick="getDashboard('monthly')" >Monthly</button>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-danger btn-lg mb-1 w-100" onclick="getDashboard('yearly')" >Yearly</button>
                        </div>
                    </div>

                    <input type="hidden" name="duration" class="duration" value="daily">
              
                    

                    <!-- Counters Row -->
                    <div class="row mt-4">
                        <!-- Expense Counter -->
                        <div class="col-md-6 text-center mb-3 mb-md-0">
                            <div class="counter-container">
                                <h6 class="text-muted">TOTAL EXPENSES</h6>
                                <h1 class="display-4 font-weight-bold total_expense">RS 1,819,819</h1>
                            </div>
                        </div>
                        
                        <!-- Balance Counter -->
                        <div class="col-md-6 text-center">
                            <div class="counter-container counter-balance">
                                <h6 class="text-muted">CURRENT BALANCE</h6>
                                <h1 class="display-4 font-weight-bold current_balance">RS 2,456,789</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 accounts_row">
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Expense Category</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div id="placeholder" class="chartsh"></div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Expense Category</h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="pieChart1" class="chart-dropshadow"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Daily Expense</h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="empchart" class="chart-dropshadow"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    <div class="row mt-4">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Monthly Expense</h3>
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
                    
                    

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header ">
                                    <h3 class="card-title ">Transactions  List</h3>
                                </div>
                                <div class="table-responsive transaction_table">
                                    
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
        <!-- Flot js -->
		<script src="{{ url('assets/plugins/flotcharts/flotcharts.js')}}"></script>
		<script src="{{ url('assets/plugins/flotcharts/flotcharts.fillbetween.js')}}"></script>
		<script src="{{ url('assets/plugins/flotcharts/flotcharts.pie.js') }}"></script>
		<script src="{{ url('assets/js/flot.js') }}"></script>
        <!-- Charts js -->
		<script src="{{ url('assets/plugins/chart/chart.bundle.js') }}"></script>
		<script src="{{ url('assets/plugins/chart/utils.js') }}"></script>

<script>

    var from = '2025-04-01'
    var to = '2025-04-31'
    var duration = $('.duration').val()

$(function() {
    
    getDataByCategory();
    getExpenses();
    getAccounts();
    getDailyExpenseChart();
    getMonthlyExpenseChart();
});

function getDashboard(duration){
    $('.duration').val(duration)
    getDataByCategory();
    getExpenses();
    getAccounts();
}

function getDataByCategory(){
    $.ajax({
            url: '{{ route('expense-management.getExpenseByCategories') }}',
            type: 'GET',
            data:{from:from,to:to,duration},
            success:function(res){
                
                if(res.status){
              
                    var values = [];
                    var labels = [];
                    var data = [];
                    for (var i = 0; i < res.data.length; i++) {
                        
                        data[i] = {
                            label: res.data[i].category,
                            data: res.data[i].percentage
                        }

                        labels.push(res.data[i].category);
                        values.push(res.data[i].percentage);
                    }

                    console.log(labels);
                    console.log(values);
                    // return;
                    

                        var placeholder = $("#placeholder");
                        placeholder.unbind();
                        $("#title").text("Label Radius");
                        $("#description").text("Slightly more transparent label backgrounds and adjusted the radius values to place them within the pie.");
                        $.plot(placeholder, data, {
                            series: {
                                pie: {
                                    show: true,
                                    radius: 1,
                                    label: {
                                        show: true,
                                        radius: 3 / 4,
                                        formatter: labelFormatter,
                                        background: {
                                            opacity: 0.5
                                        }
                                    }
                                }
                            },
                            colors: ['#6e00ff ', '#ff6e00', '#45aaf2', '#ecb403', '#64E572'],
                            legend: {
                                show: false
                            }
                        });

                             //----pie chart1
                            var ctx = document.getElementById("pieChart1");
                            ctx.height = 400;
                            var myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    datasets: [{
                                        data: values,
                                        backgroundColor: ['#6e00ff', '#ff6e00', '#0091ff', '#00ff6e', '#ee00ff'],
                                        hoverBackgroundColor: ['#6e00ff', '#ff6e00', '#0091ff', '#00ff6e', '#ee00ff'],
                                        borderColor:'transparent',
                                    }],
                                    labels: labels
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    legend: {
                                        labels: {
                                            fontColor: "#14171a"
                                        },
                                    },
                                }
                            });  
                
                }else{
                    console.log('else');
                    
                }
              
            }
    })
}

function getExpenses(){
    $.ajax({
            url: '{{ route('expense-management.getExpenses') }}',
            type: 'GET',
            data:{duration:duration},
            success:function(res){
                
                if(res.status){
              
                    $('.transaction_table').html(res.data.transactions);
                    $('.total_expense').text(res.data.total_expense);
                    $('.current_balance').text(res.data.total_balance);

                        
                
                }else{
                    console.log('else');
                    
                }
              
            }
    })
}

function getAccounts(){
    $.ajax({
            url: '{{ route('expense-management.getAccounts') }}',
            type: 'GET',
            success:function(res){
                
                if(res.status){
              
                    $('.accounts_row').html(res.data.transactions);
                
                }else{
                    console.log(res.message);
                    
                }
              
            }
    })
}

function getDailyExpenseChart(){
    $.ajax({
            url: '{{ route('expense-management.getDailyExpenseChart') }}',
            type: 'GET',
            success:function(res){
                
                if(res.status){
              
                    let labels = [];
                    let data = [];

                    res.data.forEach(value =>{
                        labels.push(value.day)
                        data.push(value.amount)
                    })

                    

                    var myCanvas = document.getElementById("empchart");
                    myCanvas.height="260";
                    var myChart = new Chart( myCanvas, {
                        type: 'line',
                        data : {
                            labels: labels,
                            type: 'line',
                            datasets: [
                            {
                                label: "Daily Expense",
                                data: data,
                                borderColor: "rgb(0,145,255,0.6)",
                                backgroundColor: "rgb(0,145,255,0.8)",
                                pointBorderWidth :2,
                                pointRadius :4,
                                pointHoverRadius :4,
                                borderWidth: 2,

                            }
                        ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            legend: {
                                display:true
                            },
                            tooltips: {
                                show: true,
                                showContent: true,
                                alwaysShowContent: true,
                                triggerOn: 'mousemove',
                                trigger: 'axis',
                                axisPointer:
                                {
                                    label: {
                                        show: false,
                                    },
                                }
                            },

                            scales: {
                                xAxes: [ {
                                    gridLines: {
                                        color: '#eaf2f9',
                                        zeroLineColor: '#bdbdc1'
                                    },
                                    ticks: {
                                        fontSize: 12,
                                        fontColor: '#bdbdc1',
                                        beginAtZero: true,
                                        padding: 0
                                    }
                                } ],
                                yAxes: [ {
                                    gridLines: {
                                        color: 'transparent',
                                        zeroLineColor: '#bdbdc1'
                                    },
                                    ticks: {
                                        fontSize: 12,
                                        fontColor: '#bdbdc1',
                                        beginAtZero: false,
                                        padding: 0
                                    }
                                } ]
                            },
                            title: {
                                display: false,
                            },
                            elements: {
                                line: {
                                    borderWidth: 2
                                },
                                point: {
                                    radius: 0,
                                    hitRadius: 10,
                                    hoverRadius: 4
                                }
                            }
                        }
                    })
                
                }else{
                    console.log(res.message);
                    
                }
              
            }
    })
}

function getMonthlyExpenseChart(){
    $.ajax({
            url: '{{ route('expense-management.getMonthlyExpenseChart') }}',
            type: 'GET',
            success:function(res){
                
                if(res.status){
              
                    let labels = [];
                    let data = [];

                    res.data.forEach(value =>{
                        labels.push(value.month)
                        data.push(parseInt(value.amount))
                    })

                    

                    /* ---hightchart7----*/
                    var chart = Highcharts.chart('highchart7', {
                        title: {
                            text: ''
                        },
                        subtitle: {
                            text: 'Plain'
                        },
                        exporting: {
                            enabled: false
                        },
                        credits: {
                            enabled: false
                        },
                        xAxis: {
                            categories: labels
                        },
                        colors: ['#6e00ff ', '#ff6e00', '#ecb403', '#24CBE5', '#64E572', '#FF9655', '#f1c40f', '#6AF9C4'],
                        series: [{
                            type: 'column',
                            colorByPoint: true,
                            data: data,
                            showInLegend: false
                        }]
                    });
                    $('#plain').click(function() {
                        chart.update({
                            chart: {
                                inverted: false,
                                polar: false
                            },
                            subtitle: {
                                text: 'Plain'
                            }
                        });
                    });
                    $('#inverted').click(function() {
                        chart.update({
                            chart: {
                                inverted: true,
                                polar: false
                            },
                            subtitle: {
                                text: 'Inverted'
                            }
                        });
                    });
                    $('#polar').click(function() {
                        chart.update({
                            chart: {
                                inverted: false,
                                polar: true
                            },
                            subtitle: {
                                text: 'Polar'
                            }
                        });
                    });

                    
                        
                
                }else{
                    console.log(res.message);
                    
                }
              
            }
    })
}


                    
             
                

</script>
@endsection
