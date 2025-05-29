@extends('layout')

@section('title', 'Dashboard')

<style>
    .box_month_filter {
        display: flex;
        gap: 19px; 
    }

    .box_for_emotion canvas,
    #incomeExpenseChart_filter_monthly { 
        max-height: 300px !important;  
    }
    
    /* shakil code here  */
    .monthly-comparison-box { 
        padding: 20px; 
    } 
    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 6px 0;
        font-size: 15px;
        color: #374151;
    }

    .highlight {
        font-weight: bold;
        color: #047857; /* green */
    }

    .diff {
        font-weight: bold;
        margin-top: 5px;
    }

    .positive {
        color: #16a34a; /* green-600 */
    }

    .negative {
        color: #dc2626; /* red-600 */
    }

    .monthly-comparison-box hr {
        border: none;
        border-top: 1px solid #e5e7eb;
        margin: 12px 0;
    }
    .expes-row {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
        justify-content: space-between
    }
    .flex-col{
        flex: 0 0 48%;
    }
    .monthly-header .box__section.box__section--header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ddd !important;
    }
    #summaryPieChart {
        max-width: 300px;
        max-height: 300px;
        margin: 0 auto;
    }
    .box_month_filter select {
        font-size: 14px !important;
        width: 110px;
    }

    @media all and (max-width: 768px) {
        .expes-row { 
            flex-direction: column;
        }
    }

    .dashboad-title-flex{
        display: flex;
        align-items: center;
        justify-content: space-between
    }
</style>

@section('body')
    <div class="wrapper my-3">
        <div class="dashboad-title-flex"> 
            <div class="dashboard-title">
                <h2>{{ __('general.dashboard') }}</h2>
                <p class="mt-1">{{ __('calendar.months.' . $month) }} {{ date('Y') }}</p>
            </div>
            <div class="dashboard-prev-month">
                @if ($flashbackAmount)
                    <div style="background: #f9fafb; border: 1px solid #e2e8f0; border-radius: 12px; padding: 16px; margin-top: 20px;">
                        <p style="font-size: 18px; margin: 0;">
                            🕒 One month ago, on <strong>{{ \Carbon\Carbon::parse($flashbackDate)->format('j F') }}</strong>, 
                            you spent <strong>{{ $currency }}{{ number_format($flashbackAmount, 2) }}</strong> 
                            on <strong>{{ $flashbackTag }}</strong>.
                        </p>
                        <p style="color: #718096; font-size: 14px; margin-top: 6px;">Worth it?</p>
                    </div>
                @endif 
            </div>
        </div>
 
        <div class="row row--gutter row--responsive my-3">
            @foreach ($widgets as $widget)
                <div class="row__column">
                    {!! $widget->render() !!}
                </div>
            @endforeach
        </div>
        @if (count($mostExpensiveTags)) 
            <div class="expes-row"> 
                <div class="box  flex-col">
                    <div class="box__section box__section--header">📊 Most Expensive {{ __('models.tags') }}</div>
                    <div class="expense-content">
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
                 </div>
                <div class="box flex-col">
                    <div class="box__section box__section--header">📊 Financial Overview (This Month)</div>
                        <!-- Monthly Comparison Box -->
                            <div class="monthly-comparison-box"> 
                                {{-- <div class="summary-row">
                                    <div>Last Month:</div>
                                    <div>৳{{ number_format($lastMonthSavings, 2) }} saved</div>
                                </div>
                                
                                <div class="summary-row highlight">
                                    <div>This Month:</div>
                                    <div>৳{{ number_format($currentSavings, 2) }} saved ✅</div>
                                </div>
                                
                                <div class="summary-row diff">
                                    <div>Difference:</div>
                                    <div class="{{ $savingsDifference >= 0 ? 'positive' : 'negative' }}">
                                        {{ $savingsDifference >= 0 ? '+' : '' }}৳{{ number_format($savingsDifference, 2) }}
                                        {{ $savingsDifference >= 0 ? '🔼' : '🔽' }}
                                    </div>
                                </div> --}}

                                {{-- <hr>  --}}
                                <canvas id="summaryPieChart" height="200"></canvas>
                                {{-- <div class="summary-row">
                                    <div>This Month's Earnings:</div>
                                    <div>৳{{ number_format($monthlyEarnings, 2) }}</div>
                                </div>

                                <div class="summary-row">
                                    <div>This Month's Spending:</div>
                                    <div>৳{{ number_format($monthlySpending, 2) }}</div>
                                </div>

                                <div class="summary-row">
                                    <div>Current Savings:</div>
                                    <div class="{{ $currentSavings >= 0 ? 'positive' : 'negative' }}">
                                        ৳{{ number_format($currentSavings, 2) }}
                                    </div>
                                </div> --}}
                            </div>

                </div> 
            </div>
        @endif 
        <div class="expes-row mt-3">
            <div class="box  flex-col">  
                <div class="box__section box__section--header">📊 Monthly Report for {{date('F')}}</div>  
                <div class="box__section">   
                    <canvas id="incomeExpenseChart" height="250"></canvas>  
                </div>
            </div> 
            <div class="box  flex-col"> 
                <div class="monthly-header">
                    <div class="box__section box__section--header">
                        <h3>📊 Filter By Monthly</h3>
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
                    </div>
                </div>
                    <div class="box__section">   
                        <canvas id="incomeExpenseChart_filter_monthly" height="250"></canvas> 
                    </div>
            </div> 
        </div> 
        

        <div class="expes-row mt-3">
            <div class="box flex-col">
            <div class="box__section box__section--header">📊 Emotion by Chart</div>
                <div class="box__section">  
                    <div class="box_for_emotion">
                        <emotion-chart />
                    </div>
                </div> 
            </div>

            <div class="box flex-col">
                <div class="box__section box__section--header">
                    📊 Past Me vs Present Me – Monthly Spending Battle
                </div>
                <div class="box__section">
                    <div 
                        id="pastVsPresentChartContainer"
                        data-currency="{{ $currency }}"
                        data-past="{{ $pastSpending }}"
                        data-present="{{ $presentSpending }}"
                    >
                        <canvas id="pastVsPresentChart"></canvas>
                    </div>
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
        incomeData = incomeData.map(value => value / 100);
        expenseData = expenseData.map(value => value / 100);

        console.log(incomeData);
        console.log(expenseData);


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

    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('summaryPieChart');

        if (ctx) {
            const chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Earning', 'Spending', 'Savings'],
                    datasets: [{
                        label: 'Monthly Summary',
                        data: [{{ $monthlyEarnings }}, {{ $monthlySpending }}, {{ $currentSavings }}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.8)',   // Income
                            'rgba(255, 99, 132, 0.8)',   // Spending
                            'rgba(75, 192, 192, 0.8)'    // Savings
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 2,
                        hoverOffset: 15, // Slight "lift" on hover
                    }]
                },
                options: {
                    responsive: true,
                    cutout: '40%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 15,
                                padding: 20,
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': {{ $currency }}' + context.raw.toFixed(2);
                                }
                            }
                        }
                    }
                }
            });
        }
    });
 
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('pastVsPresentChartContainer');
        const ctx = document.getElementById('pastVsPresentChart')?.getContext('2d');

        if (container && ctx) {
            const past = parseFloat(container.dataset.past);
            const present = parseFloat(container.dataset.present);
            const currency = container.dataset.currency;

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Last Month', 'This Month'],
                    datasets: [{
                        label: `Spending (${currency})`,
                        data: [past, present],
                        backgroundColor: [
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(54, 162, 235, 0.8)'
                        ],
                        borderColor: [
                            'rgba(255, 159, 64, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: '“Last Month vs This Month” – Who Spent Smarter?'
                        },
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: `Amount in ${currency}`
                            }
                        }
                    }
                }
            });
        }
    });
</script>



    
@endsection
