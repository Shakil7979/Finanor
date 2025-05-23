@extends('layout')

@section('title', __('pages.reports'))

<style>
    #summaryPieChart {
        max-width: 300px;
        max-height: 300px;
        margin: 0 auto;
    }
</style>

@section('body') 
    <div class="wrapper my-3">
        <h2 class="mb-4">📊 Monthly Financial Report</h2>
        <div class="row row--gutter row--responsive mt-3">
            <div class="row__column"> 
                <div class="box">
                    <div class="box__section box__section--header">Monthly Summary</div>
                    <div class="box__section">
                        <p>
                            <strong style="color: rgba(54, 162, 235, 1);">Income:</strong>
                            {{ $currency }}{{ number_format($income, 2) }}
                        </p>

                        <p>
                            <strong style="color: rgba(255, 99, 132, 1);">Spending:</strong>
                            {{ $currency }}{{ number_format($expense, 2) }}
                        </p>

                        <p>
                            <strong style="color: rgba(75, 192, 192, 1);">Savings:</strong>
                            {{ $currency }}{{ number_format($savings, 2) }}
                        </p>


                        <canvas id="summaryPieChart" height="200"></canvas>
                    </div>
                </div>

            </div>
            <div class="row__column">
                <div class="box">
                    <div class="box__section box__section--header">Top 3 Expense Tags</div>
                    <div class="box__section">
                        @forelse($topCategories as $tag)
                            <p>{{ $tag['name'] }}: {{ $currency }}{{ number_format($tag['total'] / 100, 2) }}</p>
                        @empty
                            <p>No expense data.</p>
                        @endforelse
                    </div>
                </div>
                <div class="box mt-3">
                    <div class="box__section box__section--header">Comparison With Last Month</div>
                    <div class="box__section"> 
                        <a href="{{ route('reports.show', ['slug' => 'most-expensive-tags']) }}">{{ __('reports.most_expensive_tags.title') }}</a>
                        <a href="{{ route('reports.show', ['slug' => 'most-expensive-tags']) }}">{{ __('reports.most_expensive_tags.title') }}</a>
                        <p class="mt-1">{!! __('reports.most_expensive_tags.description') !!}</p>
                    </div>
                </div>
            </div>
             
        </div> 
        <div class="row row--gutter row--responsive mt-3">
            <div class="row__column">
                <div class="box">
                    <div class="box__section box__section--header">Top 3 Expense Tags</div>
                    <div class="box__section">
                        @forelse($topCategories as $tag)
                            <p>{{ $tag['name'] }}: {{ $currency }}{{ number_format($tag['total'] / 100, 2) }}</p>
                        @empty
                            <p>No expense data.</p>
                        @endforelse
                    </div>
                </div>
            </div> 
            <div class="row__column">
                <div class="box">
                    <div class="box__section box__section--header">Total Transactions</div>
                    <div class="box__section">
                        <p><strong>Incomes:</strong> {{ $totalIncomes }}</p>
                        <p><strong>Expenses:</strong> {{ $totalExpenses }}</p>
                    </div>
                </div>
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
