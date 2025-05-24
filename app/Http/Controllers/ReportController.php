<?php

namespace App\Http\Controllers;

use App\Models\DailySaving;
use App\Repositories\TagRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request; 
use App\Models\Earning;
use App\Models\Spending;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct(private readonly TransactionRepository $transactionRepository, private readonly TagRepository $tagRepository)
    {
    }
    // public function index()
    // {
    //     $space_id = session('space_id');
    //     $currency = session('selected_space_currency') ?? '৳';

    //     $now = Carbon::now();
    //     $startOfMonth = $now->copy()->startOfMonth();
    //     $lastMonth = $now->copy()->subMonthNoOverflow()->startOfMonth();

    //     $income = Earning::where('space_id', $space_id)
    //         ->whereBetween('happened_on', [$startOfMonth, $now])
    //         ->sum('amount') / 100;

    //     $expense = Spending::where('space_id', $space_id)
    //         ->whereBetween('happened_on', [$startOfMonth, $now])
    //         ->sum('amount') / 100;

    //     $savings = $income - $expense;

    //     $lastMonthSavings = DailySaving::where('user_id', $space_id)
    //         ->where('date', $lastMonth->format('Y-m-d'))
    //         ->value('amount') ?? 0;

    //     $topCategories = Spending::where('spendings.space_id', $space_id) 
    //         ->whereBetween('happened_on', [$startOfMonth, $now])
    //         ->join('tags', 'spendings.tag_id', '=', 'tags.id')
    //         ->select('tags.name', DB::raw('SUM(spendings.amount) as total'))
    //         ->groupBy('tags.name')
    //         ->orderByDesc('total')
    //         ->limit(3)
    //         ->get();


    //     $totalIncomes = Earning::where('space_id', $space_id)
    //         ->whereBetween('happened_on', [$startOfMonth, $now])
    //         ->count();

    //     $totalExpenses = Spending::where('space_id', $space_id)
    //         ->whereBetween('happened_on', [$startOfMonth, $now])
    //         ->count();

    //     return view('reports.index', compact(
    //         'income', 'expense', 'savings', 'lastMonthSavings',
    //         'topCategories', 'totalIncomes', 'totalExpenses', 'currency'
    //     ));
    // }

    public function index()
    {
        $space_id = session('space_id');
        $currency = session('selected_space_currency') ?? '৳';

        $now = Carbon::now();
        $startOfMonth = $now->copy()->startOfMonth();
        $lastMonth = $now->copy()->subMonthNoOverflow()->startOfMonth();

        // ✅ Income, Expense, and Savings
        $income = Earning::where('space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->sum('amount') / 100;

        $expense = Spending::where('space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->sum('amount') / 100;

        $savings = $income - $expense;

        // ✅ Last Month Savings
        $lastMonthSavings = DailySaving::where('user_id', $space_id)
            ->where('date', $lastMonth->format('Y-m-d'))
            ->value('amount') ?? 0;

        // ✅ Top 3 Expense Categories
        $topCategories = Spending::where('spendings.space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->join('tags', 'spendings.tag_id', '=', 'tags.id')
            ->select('tags.name', DB::raw('SUM(spendings.amount) as total'))
            ->groupBy('tags.name')
            ->orderByDesc('total')
            ->limit(3)
            ->get();

        // ✅ Total Transactions
        $totalIncomes = Earning::where('space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->count();

        $totalExpenses = Spending::where('space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->count();

        // ✅ Average Daily Spending
        $daysPassed = $now->diffInDays($startOfMonth) + 1;
        $avgDailySpending = $daysPassed > 0 ? $expense / $daysPassed : 0;

        // ✅ Category-wise Full List
        $categoryBreakdown = Spending::where('spendings.space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->join('tags', 'spendings.tag_id', '=', 'tags.id')
            ->select('tags.name', DB::raw('SUM(spendings.amount) as total'))
            ->groupBy('tags.name')
            ->orderByDesc('total')
            ->get();

        $categoryWiseSpending = Spending::where('spendings.space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->join('tags', 'spendings.tag_id', '=', 'tags.id')
            ->select('tags.name', DB::raw('SUM(spendings.amount) as total'))
            ->groupBy('tags.name')
            ->orderByDesc('total')
            ->get();

        $trendLabels = [];
        $trendIncomeSeries = [];
        $trendExpenseSeries = [];

        $startOfMonth = Carbon::now()->copy()->startOfMonth();
        $today = Carbon::now()->copy();

        $period = \Carbon\CarbonPeriod::create($startOfMonth, $today);

        foreach ($period as $date) {
            $day = $date->format('Y-m-d');
            $trendLabels[] = $date->format('d M');

            $dayIncome = Earning::where('space_id', $space_id)
                ->whereDate('happened_on', $day)
                ->sum('amount') / 100;

            $dayExpense = Spending::where('space_id', $space_id)
                ->whereDate('happened_on', $day)
                ->sum('amount') / 100;

            $trendIncomeSeries[] = $dayIncome;
            $trendExpenseSeries[] = $dayExpense;
        }


        return view('reports.index', compact(
            'income',
            'expense',
            'savings',
            'lastMonthSavings',
            'topCategories',
            'totalIncomes',
            'totalExpenses',
            'avgDailySpending',
            'categoryBreakdown',
            'currency',
            'categoryWiseSpending',
            'trendLabels',
            'trendIncomeSeries',
            'trendExpenseSeries'
        ));
    }



    private function weeklyReport($year)
    {
        return view('reports.weekly_report', [
            'year' => $year,
            'weeks' => $this->transactionRepository->getWeeklyBalance($year)
        ]);
    }

    private function mostExpensiveTags()
    {
        $totalSpent = Spending::query()->where('space_id', session('space_id'))->sum('amount');
        $mostExpensiveTags = $this->tagRepository->getMostExpensiveTags(session('space_id'));

        return view('reports.most_expensive_tags', compact('totalSpent', 'mostExpensiveTags'));
    }

    public function show(Request $request, $slug)
    {
        switch ($slug) {
            case 'weekly-report':
                $year = date('Y');

                if ($request->get('year')) {
                    $year = $request->get('year');
                }

                return $this->weeklyReport($year);

            case 'most-expensive-tags':
                return $this->mostExpensiveTags();

            default:
                return '404';
        }
    }
}
