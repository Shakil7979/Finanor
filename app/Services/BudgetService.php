<?php
namespace App\Services;

use App\Models\Earning;
use App\Models\Spending;
use Carbon\Carbon;

class BudgetService
{
    public static function calculateDailyLimit($spaceId)
    {
        $now = \Carbon\Carbon::now();
        $daysInMonth = $now->daysInMonth;

        // Filter amount != 0 and adjust value by dividing 100
        $totalIncome = \App\Models\Earning::where('space_id', $spaceId)
            ->whereMonth('happened_on', $now->month)
            ->whereYear('happened_on', $now->year)
            ->where('amount', '!=', 0)
            ->sum('amount') / 100;

        $totalExpense = \App\Models\Spending::where('space_id', $spaceId)
            ->whereMonth('happened_on', $now->month)
            ->whereYear('happened_on', $now->year)
            ->where('amount', '!=', 0)
            ->sum('amount') / 100;

        $netBalance = $totalIncome - $totalExpense;

        $dailyLimit = round($netBalance / $daysInMonth, 2);

        return max($dailyLimit, 0);
    }

}
