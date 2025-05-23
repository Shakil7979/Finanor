<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Earning;
use App\Models\Spending;
use App\Models\DailySaving;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;
use App\Repositories\DashboardRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\BudgetService;

class DashboardController extends Controller
{
    public function __construct(private readonly DashboardRepository $dashboardRepository, private readonly TagRepository $tagRepository)
    {
    }
  

// public function __invoke(Request $request)
// {
//     $space_id = session('space_id');
//     $currentYear = date('Y');
//     $currentMonth = date('m');
//     $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

//     $mostExpensiveTags = $this->tagRepository->getMostExpensiveTags($space_id, 3, $currentYear, $currentMonth);
 
//     $dailyBalance2 = (array) $this->dashboardRepository->getDailyBalance($space_id, $currentYear, $currentMonth);
//     $totalSpent2 = (array) $this->dashboardRepository->getTotalAmountSpent($currentYear, $currentMonth);
 
//     $dailyIncome = $this->getDailyIncomeData($space_id, $currentYear, $currentMonth); 
//     $dailyExpense = $this->getDailyExpenseData($space_id, $currentYear, $currentMonth);

//     return view('dashboard', [
//         'month' => date('n'),
//         'widgets' => $request->user()->widgets()->orderBy('sorting_index')->get(),
//         'totalSpent' => $this->dashboardRepository->getTotalAmountSpent($currentYear, $currentMonth),
//         'mostExpensiveTags' => $mostExpensiveTags,
//         'dailyBalance2' => $dailyBalance2,  
//         'totalSpent2' => $totalSpent2,
//         'daysInMonth' => $daysInMonth,
//         'dailyBalance' => $this->dashboardRepository->getDailyBalance($space_id, $currentYear, $currentMonth),
//         'dailyIncome' => $dailyIncome,   
//         'dailyExpense' => $dailyExpense, 
//     ]);
// }
 

    public function __invoke(Request $request)
    {
        $space_id = session('space_id');
        $currentYear = date('Y');
        $currentMonth = date('m');
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

        $mostExpensiveTags = $this->tagRepository->getMostExpensiveTags($space_id, 5, $currentYear, $currentMonth);

        $dailyBalance2 = (array) $this->dashboardRepository->getDailyBalance($space_id, $currentYear, $currentMonth);
        $totalSpent2 = (array) $this->dashboardRepository->getTotalAmountSpent($currentYear, $currentMonth);

        $dailyIncome = $this->getDailyIncomeData($space_id, $currentYear, $currentMonth);
        $dailyExpense = $this->getDailyExpenseData($space_id, $currentYear, $currentMonth);

        // 🔸 Monthly Earnings & Spending
        $startOfMonth = Carbon::now()->startOfMonth();
        $now = Carbon::now();

        $monthlyEarnings = Earning::where('space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->sum('amount') / 100;

        $monthlySpending = Spending::where('space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->sum('amount') / 100;

        $currentSavings = $monthlyEarnings - $monthlySpending;

        // 🔸 Last Month Savings
        $lastMonth = Carbon::now()->subMonthNoOverflow(); 
        $lastMonthSavings = DailySaving::where('user_id', $space_id)
            ->whereMonth('date', $lastMonth->month)
            ->whereYear('date', $lastMonth->year)
            ->value('amount') ?? 0;

        $savingsDifference = $currentSavings - $lastMonthSavings;

        return view('dashboard', [
            'month' => date('n'),
            'widgets' => $request->user()->widgets()->orderBy('sorting_index')->get(),
            'totalSpent' => $this->dashboardRepository->getTotalAmountSpent($currentYear, $currentMonth),
            'mostExpensiveTags' => $mostExpensiveTags,
            'dailyBalance2' => $dailyBalance2,
            'totalSpent2' => $totalSpent2,
            'daysInMonth' => $daysInMonth,
            'dailyBalance' => $this->dashboardRepository->getDailyBalance($space_id, $currentYear, $currentMonth),
            'dailyIncome' => $dailyIncome,
            'dailyExpense' => $dailyExpense,

            // 🔹 Pass monthly savings data
            'monthlyEarnings' => $monthlyEarnings,
            'monthlySpending' => $monthlySpending,
            'currentSavings' => $currentSavings,
            'lastMonthSavings' => $lastMonthSavings,
            'savingsDifference' => $savingsDifference,
        ]);
    }

// Fetch daily income data for the current month
public function getDailyIncomeData($space_id, $year, $month)
{
    return DB::table('earnings')
        ->select(DB::raw('DAY(happened_on) as day'), DB::raw('SUM(amount) as total_income'))
        ->whereYear('happened_on', $year)
        ->whereMonth('happened_on', $month)
        ->where('space_id', $space_id)
        ->groupBy(DB::raw('DAY(happened_on)'))
        ->pluck('total_income', 'day')
        ->toArray();
}


 
// Fetch daily expense data for the current month
public function getDailyExpenseData($space_id, $year, $month)
{
    return DB::table('spendings')
        ->select(DB::raw('DAY(happened_on) as day'), DB::raw('SUM(amount) as total_expense'))
        ->whereYear('happened_on', $year)
        ->whereMonth('happened_on', $month)
        ->where('space_id', $space_id)
        ->groupBy(DB::raw('DAY(happened_on)'))
        ->pluck('total_expense', 'day')
        ->toArray();
} 


public function getChartData(Request $request)
{
    $month = $request->month;
    $year = $request->year;
    $daysInMonth = Carbon::create($year, $month, 1)->daysInMonth;

    $incomeData = [];
    $expenseData = [];
    $days = [];

    // Group income data by day
    $incomes = Earning::selectRaw('DAY(happened_on) as day, SUM(amount) as total')
        ->whereMonth('happened_on', $month)
        ->whereYear('happened_on', $year)
        ->groupBy('day')
        ->pluck('total', 'day'); // key = day, value = total

    // Group expense data by day
    $expenses = Spending::selectRaw('DAY(happened_on) as day, SUM(amount) as total')
        ->whereMonth('happened_on', $month)
        ->whereYear('happened_on', $year)
        ->groupBy('day')
        ->pluck('total', 'day');

    // Prepare chart arrays
    for ($day = 1; $day <= $daysInMonth; $day++) {
        $incomeData[] = $incomes[$day] ?? 0;   // If not found, 0
        $expenseData[] = $expenses[$day] ?? 0; // If not found, 0
        $days[] = $day;
    }

    return response()->json([
        'incomeData' => $incomeData,
        'expenseData' => $expenseData,
        'days' => $days,
    ]);
}


public function checkBudgetAlerts()
{
    $currentMonth = Carbon::now()->format('m');
    $currentYear = Carbon::now()->format('Y');

    $alerts = [];

    $budgets = Budget::whereMonth('starts_on', $currentMonth)
        ->whereYear('starts_on', $currentYear)
        ->get(); 


    foreach ($budgets as $budget) {
        $tagId = $budget->tag_id;

        $totalSpent = Spending::where('tag_id', $tagId)
            ->whereMonth('happened_on', $currentMonth)
            ->whereYear('happened_on', $currentYear)
            ->sum('amount');

        if ($totalSpent >= $budget->amount) {
            $alerts[] = [
                'type' => 'danger',
                'message' => $budget->tag->name . ' budget is over!',
            ];
        } elseif ($totalSpent >= ($budget->amount * 0.8)) {
            $alerts[] = [
                'type' => 'warning',
                'message' => $budget->tag->name . ' budget is almost used up!',
            ];
        }
    }

    return response()->json($alerts);
}
 
}
