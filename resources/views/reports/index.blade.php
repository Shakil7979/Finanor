@extends('layout')

@section('title', __('pages.reports'))

<style>
    #summaryPieChart {
        max-width: 300px;
        max-height: 300px;
        margin: 0 auto;
    }
    .box__section  div {
        display: flex;
        justify-content: space-between;
        align-items: center
    }
    .sk-box .box {
        height: 100%;
    }
    /* .sk-table ttrd, */
    .sk-table tr {
        border: 1px solid #ddd;
    }

    .sk-table {
        padding: ;
        width: 100%;
    }
    .sk-table td, .sk-table th {
        border: 1px solid #ddd;
        padding: 5px;
    }
</style>

@section('body') 
    <div class="wrapper my-3">
        <h2 class="mb-4">📊 Monthly Financial Report</h2>
        <div class="row row--gutter row--responsive mt-3">
            <div class="row__column"> 
                <div class="box">
                    <div class="box__section box__section--header">Monthly Summary</div>
                    <div class="box__section grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="flex flex-col items-start bg-blue-50 border-l-4 border-blue-400 p-4 rounded-lg shadow-sm">
                            <h4 class="text-sm text-blue-700 font-semibold mb-1">Income</h4>
                            <p class="text-blue-900 text-lg font-bold">
                                {{ $currency }}{{ number_format($income, 2) }}
                            </p>
                        </div>

                        <div class="flex flex-col items-start bg-red-50 border-l-4 border-red-400 p-4 rounded-lg shadow-sm">
                            <h4 class="text-sm text-red-700 font-semibold mb-1">Spending</h4>
                            <p class="text-red-900 text-lg font-bold">
                                {{ $currency }}{{ number_format($expense, 2) }}
                            </p>
                        </div>

                        <div class="flex flex-col items-start bg-green-50 border-l-4 border-green-400 p-4 rounded-lg shadow-sm">
                            <h4 class="text-sm text-green-700 font-semibold mb-1">Savings</h4>
                            <p class="text-green-900 text-lg font-bold">
                                {{ $currency }}{{ number_format($savings, 2) }}
                            </p>
                        </div>
                        
                        <canvas id="summaryPieChart" height="200"></canvas>
                    </div>

                </div>

            </div>
            <div class="row__column">
               
<!-- Category-wise Spending (Full List) -->
                <div class="box col-span-1 md:col-span-2">
                    <div class="box__section box__section--header">📂 Category-wise Spending</div>
                    <div class="box__section">
                        <table class="w-full text-left sk-table">
                            <thead>
                                <tr>
                                    <th class="py-2 border-b">Category</th>
                                    <th class="py-2 border-b">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categoryWiseSpending as $category)
                                    <tr>
                                        <td class="py-2 border-b">{{ $category['name'] }}</td>
                                        <td class="py-2 border-b">{{ $currency }}{{ number_format($category['total'] / 100, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="py-2 text-gray-500">No spending data available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="box mt-3">
                    <div class="box__section box__section--header">Most Expensive Tags</div>
                    <div class="box__section"> 
                        <a href="{{ route('reports.show', ['slug' => 'most-expensive-tags']) }}">{{ __('reports.most_expensive_tags.title') }}</a>
                        <a href="{{ route('reports.show', ['slug' => 'most-expensive-tags']) }}">{{ __('reports.most_expensive_tags.title') }}</a>
                        <p class="mt-1">{!! __('reports.most_expensive_tags.description') !!}</p>
                    </div>
                </div>
            </div>
             
        </div> 
        <div class="row row--gutter row--responsive mt-3 sk-box">
            <div class="row__column">
                <!-- Average Daily Spending -->
                <div class="box">
                    <div class="box__section box__section--header">📊 Average Daily Spending</div>
                    <div class="box__section">
                        <p class="text-xl">You are spending on average:</p>
                        <p class="text-3xl font-bold text-red-500 mt-2">{{ $currency }}{{ number_format($avgDailySpending, 2) }} / day</p>
                    </div>
                </div>

            </div> 


            <div class="row__column">
                 <div class="box">
                    <div class="box__section box__section--header">Top 3 Expense Tags</div>
                    <div class="box__section">
                            @forelse($topCategories as $tag)
                                <div class="flex items-center justify-between bg-gray-50 border border-gray-200 rounded-xl px-4 py-2 mb-2 shadow-sm hover:bg-gray-100 transition-all">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-3 h-3 rounded-full" style="background-color: {{ $tag['color'] ?? '#3490dc' }}"></div>
                                        <span class="font-semibold text-gray-700">{{ $tag['name'] }}</span>
                                    </div>
                                    <div class="text-right text-gray-800 font-medium">
                                        {{ $currency }}{{ number_format($tag['total'] / 100, 2) }}
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">No expense data.</p>
                            @endforelse
                        </div>

                </div> 
            </div>
             
        </div> 
 
        <!-- Income vs Spending Trend -->
        <div class="box mt-3">
            <div class="box__section box__section--header">📈 Income vs Spending Trend</div>
            <div class="box__section">
                <canvas id="trendChart" height="200"></canvas>
            </div>
        </div> 
 
             
            

        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('summaryPieChart');

        if (ctx) {
            const chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Income', 'Spending', 'Savings'],
                    datasets: [{
                        label: 'Monthly Summary',
                        data: [{{ $income }}, {{ $expense }}, {{ $savings }}],
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
        const ctxTrend = document.getElementById('trendChart')?.getContext('2d');

        if (ctxTrend) {
            new Chart(ctxTrend, {
                type: 'line',
                data: {
                    labels: {!! json_encode($trendLabels) !!},
                    datasets: [
                        {
                            label: 'Income',
                            data: {!! json_encode($trendIncomeSeries) !!},
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            fill: true,
                            tension: 0.3,
                            pointRadius: 3,
                            pointHoverRadius: 6,
                        },
                        {
                            label: 'Spending',
                            data: {!! json_encode($trendExpenseSeries) !!},
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            fill: true,
                            tension: 0.3,
                            pointRadius: 3,
                            pointHoverRadius: 6,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                color: '#333',
                                font: {
                                    size: 14
                                }
                            }
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        }
                    },
                    interaction: {
                        mode: 'nearest',
                        axis: 'x',
                        intersect: false
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date',
                                color: '#666',
                                font: {
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                color: '#444'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Amount ({{ $currency }})',
                                color: '#666',
                                font: {
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                color: '#444'
                            }
                        }
                    }
                }
            });
        }
    });
</script>
