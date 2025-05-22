@extends('layout')

@section('title', 'Dashboard')

<style>
    .box_month_filter {
        display: flex;
        gap: 19px;
        margin-bottom: 22px;
    }

    .box_for_emotion canvas,
    #incomeExpenseChart_filter_monthly { 
        max-height: 300px !important;  
    }
    /* #incomeExpenseChart_filter_monthly {
        height: 250px !important; 
        widows:  100% !important;
    } */ 
    /* .box_for_emotion canvas {
        height: 400px !important;
        width: 100% !important;
    } */
</style>

@section('body')
    <div class="wrapper my-3">
        <h2>{{ __('general.dashboard') }}</h2>
        <p class="mt-1">{{ __('calendar.months.' . $month) }} {{ date('Y') }}</p>
        <div class="row row--gutter row--responsive my-3">
            @foreach ($widgets as $widget)
                <div class="row__column">
                    {!! $widget->render() !!}
                </div>
            @endforeach
        </div>
        @if (count($mostExpensiveTags))
            <div class="box mt-3">
                <div class="box__section box__section--header">Most Expensive {{ __('models.tags') }}</div>
                @foreach ($mostExpensiveTags as $index => $tag)
                    <div class="box__section row row--seperate">
                        <div class="row__column row__column--middle color-dark">
                            @include('partials.tag', ['payload' => $tag])
                        </div>
                        <div class="row__column row__column--middle">
                            <progress max="{{ $totalSpent }}" value="{{ $tag->amount }}"></progress>
                        </div>
                        <div class="row__column row__column--middle text-right">{!! $currency !!} {{ \App\Helper::formatNumber($tag->amount / 100) }}</div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="box mt-3">
            <div class="box__section box__section--header">Monthly Report for {{date('F')}}</div>
            <div class="box__section">   
                <canvas id="incomeExpenseChart" height="250"></canvas>  
            </div>
              
        </div>

        <div class="box mt-3">
            <div class="box__section box__section--header">Filter By Monthly</div>
            <div class="box__section">  
                <div class="box_month_filter">
                    <select id="month">
                        <option value="">Select Month</option>
                        @for ($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}">{{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
                        @endfor
                    </select>
                    
                    <select id="year">
                        <option value="">Select Year</option>
                        @for ($y = 2023; $y <= now()->year; $y++)
                            <option value="{{ $y }}">{{ $y }}</option>
                        @endfor
                    </select>
                </div> 
 
                
                <canvas id="incomeExpenseChart_filter_monthly" height="250"></canvas>
                

            </div>
              
        </div>
        <div class="box mt-3">
            <div class="box__section box__section--header">Emotion by Chart</div>
            <div class="box__section">  
                 <div class="box_for_emotion">
                    <emotion-chart />
                 </div>
            </div> 
        </div>
    </div>
    
@endsection  
 

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 

<script>
    window.onload = function() {
        // Check if the data is correctly passed
        console.log(@json($dailyIncome)); // To ensure daily income data is received
        console.log(@json($dailyExpense)); // To ensure daily expense data is received

        var dailyIncomeData = @json($dailyIncome);
        var dailyExpenseData = @json($dailyExpense);
        var daysInMonth = @json(range(1, $daysInMonth)); // Array of days (1 to 31)

        // Prepare the data arrays for the chart
        var incomeData = [];
        var expenseData = [];

        // Loop through each day and fill the data arrays
        daysInMonth.forEach(function(day) {
            incomeData.push(dailyIncomeData[day] || 0); // If no income, set to 0
            expenseData.push(dailyExpenseData[day] || 0); // If no expense, set to 0
        });

        // Create the chart
        var ctx = document.getElementById('incomeExpenseChart').getContext('2d');
        var incomeExpenseChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: daysInMonth,  // X-axis labels (Days of the month)
                datasets: [{
                    label: 'Income',
                    data: incomeData,  // Daily income data
                    borderColor: 'rgba(75, 192, 192, 1)',  // Line color for income
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Fill color for income
                    fill: true,  // Fill under the line
                    tension: 0.4,  // Line smoothness
                    borderWidth: 2,
                },
                {
                    label: 'Expense',
                    data: expenseData,  // Daily expense data
                    borderColor: 'rgba(255, 99, 132, 1)',  // Line color for expense
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',  // Fill color for expense
                    fill: true,  // Fill under the line
                    tension: 0.4,  // Line smoothness
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Days of the Month'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Amount (in your currency)'
                        },
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            }
        });
    } 

</script> 
<script>
    let chartInstance = null;

    function updateChart(days, incomeData, expenseData) {
        const ctx = document.getElementById('incomeExpenseChart_filter_monthly').getContext('2d');

        // Set a fixed height for the chart canvas programmatically
        const chartCanvas = document.getElementById('incomeExpenseChart_filter_monthly');
        chartCanvas.height = 250; // Set height to 250px

        if (chartInstance) {
            chartInstance.destroy();
        } 
        chartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: days,
                datasets: [
                    {
                        label: 'Income',
                        data: incomeData,
                        borderColor: 'green',
                        backgroundColor: 'rgba(0,255,0,0.2)',
                        fill: true
                    },
                    {
                        label: 'Expense',
                        data: expenseData,
                        borderColor: 'red',
                        backgroundColor: 'rgba(255,0,0,0.2)',
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    $(document).ready(function () {
        // Default chart with 0 values
        const defaultDays = Array.from({ length: 30 }, (_, i) => i + 1);
        const zeroData = Array(30).fill(0);
        updateChart(defaultDays, zeroData, zeroData);

        // Filter change event
        $('#month, #year').on('change', function () {
            let month = $('#month').val();
            let year = $('#year').val();

            if (month && year) {
                $.ajax({
                    url: "{{ route('get.chart.data') }}",
                    type: "GET",
                    data: {
                        month: month,
                        year: year
                    },
                    success: function (response) {
                        updateChart(response.days, response.incomeData, response.expenseData);
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                    }
                });
            }
        });
    });
</script>




    
@endsection
