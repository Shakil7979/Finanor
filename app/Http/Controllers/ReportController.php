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
    public function index()
    {
        $space_id = session('space_id');
        $currency = session('selected_space_currency') ?? '৳';

        $now = Carbon::now();
        $startOfMonth = $now->copy()->startOfMonth();
        $lastMonth = $now->copy()->subMonthNoOverflow()->startOfMonth();

        $income = Earning::where('space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->sum('amount') / 100;

        $expense = Spending::where('space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->sum('amount') / 100;

        $savings = $income - $expense;

        $lastMonthSavings = DailySaving::where('user_id', $space_id)
            ->where('date', $lastMonth->format('Y-m-d'))
            ->value('amount') ?? 0;

        $topCategories = Spending::where('spendings.space_id', $space_id) // ✅ specify table
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->join('tags', 'spendings.tag_id', '=', 'tags.id')
            ->select('tags.name', DB::raw('SUM(spendings.amount) as total'))
            ->groupBy('tags.name')
            ->orderByDesc('total')
            ->limit(3)
            ->get();


        $totalIncomes = Earning::where('space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->count();

        $totalExpenses = Spending::where('space_id', $space_id)
            ->whereBetween('happened_on', [$startOfMonth, $now])
            ->count();

        return view('reports.index', compact(
            'income', 'expense', 'savings', 'lastMonthSavings',
            'topCategories', 'totalIncomes', 'totalExpenses', 'currency'
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
